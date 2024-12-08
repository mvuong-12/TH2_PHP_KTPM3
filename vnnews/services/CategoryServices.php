<?php

class CategoryServices extends Database
{
    protected string $table = 'categories';
    protected array $cols = ["id", "NAME"];

    public function getAllNews(array $limitOptions = []): array
    {
        $sql = "SELECT * FROM $this->table";
        if (!empty($limitOptions)) {
            $sql .= " ORDER BY id ASC LIMIT :length OFFSET :offset";
            $offset = 0;
            if (count($limitOptions) > 1) {
                $offset += $limitOptions[0];
            }

            if (is_numeric($offset) && is_numeric($limitOptions[1])) {
                return $this->readLimit($sql, +$limitOptions[1], +$offset);
            }
            return [];
        } else {
            $sql .= " ORDER BY id ASC";
            return $this->read($sql);
        }
    }

    public function create(string $name): bool
    {
        $sql = "INSERT INTO $this->table (NAME) VALUES (:NAME)";
        return $this->insert($sql, [$this->cols[1] => $name]);
    }

    public function updateRow(Category $ctg): int|false
    {
        $sql = "UPDATE $this->table SET NAME=:NAME WHERE id=:id";
        return $this->update($sql, [$this->cols[0] => $ctg->getId(), $this->cols[1] => $ctg->getName()]);
    }

    public function deleteRow(string $id): bool
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        return $this->delete($sql, [$id]);
    }
}