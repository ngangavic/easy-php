<?php

class Delete
{
    public $deletestatement;
    public $data;
    public $connection;
    public $report;


    function set_deletestatement($deletestatement)
    {
        $this->deletestatement = $deletestatement;
    }

    function set_data($data)
    {
        $this->data = $data;
    }

    function set_connection($connection)
    {
        $this->connection = $connection;
    }

    function delete_data()
    {
        if (empty($this->deletestatement) || empty($this->data)) {
            exit('SQL Statement or data not set');
        } else {
            $stmt = $this->connection->prepare($this->deletestatement);
            $stmt->bind_param(str_repeat("s", count($this->data)), ...$this->data);
            if (!$stmt->execute()) {
                $this->report = 'Delete Error';
            } else {
                $this->report = 'Deleted';
            }
        }
    }
}
