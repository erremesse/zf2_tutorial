<?php
namespace Timeline\Model;

use Zend\Db\TableGateway\TableGateway;

class TimelineTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
//         \Zend\Debug\Debug::dump($resultSet);
//         die;
        return $resultSet;
    }

    public function getTimeline($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveTimeline(Timeline $timeline)
    {
        $data = array(
            'start_date' => $timeline->start_date,
            'headline'  => $timeline->headline,
            'text'  => $timeline->text,
        );

        $id = (int) $timeline->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getTimeline($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Timetable id does not exist');
            }
        }
    }

    public function deleteTimeline($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}