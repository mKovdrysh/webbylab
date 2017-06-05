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

    public function getList()
    {
        $stmt = $this->getPdo()->prepare(
            'SELECT * FROM movies ORDER BY title'
        );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
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

    public function getResult($search)
    {
        $preparedTitle = '%' . $search . '%';
        $stmt = $this->getPdo()->prepare('SELECT * FROM movies WHERE title LIKE :search OR actors LIKE :search');
        $stmt->bindParam(':search', $preparedTitle);
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
