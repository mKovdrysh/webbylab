<?php

namespace Masha\Model;

class Movie extends AbstractModel
{
    public function add($title, $year, $format, $actors)
    {
        $stmt = $this->getPdo()->prepare(
            'INSERT INTO movies (title, year, format, actors) VALUES (:title, :year, :format, :actors)'
        );
        $stmt->execute([
            ':title' => $title,
            ':year' => $year,
            ':format' => $format,
            ':actors' => $actors
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->getPdo()->prepare(
            'DELETE FROM movies WHERE id = :id'
        );
        $stmt->execute([
            ':id' => $id
        ]);
    }

    public function getList($search = '', $sort = 'id', $order = 'DESC')
    {
        $sort = in_array($sort, ['id', 'title', 'year']) ? $sort : 'id';
        $order = in_array($order, ['ASC', 'DESC']) ? $order : 'DESC';

        if ($search) {
            $stmt = $this->getPdo()->prepare(
                "SELECT * FROM movies WHERE MATCH (title, actors) AGAINST(:search) ORDER BY $sort $order"
            );
            $stmt->bindParam(':search', $search);
        } else {
            $stmt = $this->getPdo()->prepare(
                "SELECT * FROM movies ORDER BY $sort $order"
            );
        }

        $stmt->execute();

        return $stmt->fetchALL(\PDO::FETCH_ASSOC);
    }

    public function processData()
    {
        $fp = fopen($_FILES['file']['tmp_name'], 'rb');
        $importData = [];
        while (($line = fgets($fp)) !== false) {
            $data = explode(':', $line);
            $column = !empty($data[0]) ? $data[0] : null;

            unset($data[0]);

            $value = implode(':', $data);
            $value = trim($value);

            $keyMap = [
                'Title' => 'title',
                'Release Year' => 'year',
                'Format' => 'format',
                'Stars' => 'actors'
            ];

            if (isset($keyMap[$column])) {
                $importData[$keyMap[$column]] = $value;
            } elseif ($importData) {
                $this->add(
                    $importData['title'],
                    $importData ['year'],
                    $importData['format'],
                    $importData['actors']
                );

                $importData = [];
            }
        }
    }
}

