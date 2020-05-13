<?php

class Update
{
    public $updatestatement;
    public $data;
    public $connection;
    public $report;


    function set_updatestatement($updatestatement)
    {
        $this->updatestatement = $updatestatement;
    }

    function set_data($data)
    {
        $this->data = $data;
    }

    function set_connection($connection)
    {
        $this->connection = $connection;
    }

    function update_data()
    {
        if (empty($this->updatestatement) || empty($this->data)) {
            exit('SQL Statement or data not set');
        } else {
            $stmt = $this->connection->prepare($this->updatestatement);
            $stmt->bind_param(str_repeat("s", count($this->data)), ...$this->data);
            if (!$stmt->execute()) {
                $this->report = 'Update Error';
            } else {
                $this->report = 'Updated';
            }
        }
    }
}
