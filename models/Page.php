<?php

namespace App;

class Pages extends ModelController {

    public function getList($only_published = flase) {
        $sql = " SELECT * FROM `pages` ";
        if ($only_published) {
            $sql .= " WHERE `is_published` = '1' ";
        }

        # arr_echo($this->db->query($sql));

        return $this->db->query($sql);
    }

    public function getByAlias ($alias) {
        $alias = $this->db->escape($alias);
        $sql = "SELECT * FROM pages WHERE alias = '{$alias}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }
}