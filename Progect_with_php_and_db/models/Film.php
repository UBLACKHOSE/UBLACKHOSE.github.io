<?php


class Film
{
    public static function getFilmsListInMainPage($count = 5){
        $count = intval($count);
        $db =db::getConnection();

        $filmList = array();

        $result = $db->query("SELECT * FROM
 films ORDER BY `id` DESC LIMIT ".$count);

        $i=0;
        while ($row = $result->fetch_assoc()){
            $filmList[$i]['id'] = $row['id'];
            $filmList[$i]['name'] = $row['name'];
            $filmList[$i]['year'] = $row['year'];
            $filmList[$i]['country'] = $row['country'];
            $filmList[$i]['producer_r+'] = $row['producer_r+'];
            $filmList[$i]['producer'] = $row['producer'];
            $filmList[$i]['scenario'] = $row['scenario'];
            $filmList[$i]['operator'] = $row['operator'];
            $filmList[$i]['composer'] = $row['composer'];
            $filmList[$i]['premiere'] = $row['premiere'];
            $filmList[$i]['age'] = $row['age'];
            $filmList[$i]['description'] = $row['description'];
            $filmList[$i]['genre'] = $row['genre'];
            $filmList[$i]['img'] = $row['img'];
            $i++;
        }
        return $filmList;
    }
    public static function getFilmById($id){
        $id = intval($id);

        if ($id){
            $db = db::getConnection();
            $result = $db->query('SELECT * FROM films WHERE id= '.$id);
            // $result ->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch_assoc();
        }
    }

    public static function checkFilmByUserStatus($id_film,$id_user){
        $db = db::getConnection();
//        $result = $db->query('SELECT COUNT(`id_operation`) AS COUNT FROM films/users WHERE id_user= "'.$id_user.'" and id_film = "'.$id_film.'"');
        $result = $db->query('SELECT COUNT(`id_operation`) AS COUNT FROM `films/users` WHERE `id_film`="'.$id_film.'" and `id_user`="'.$id_user.'"');

        $row = $result->fetch_assoc();
        if ($row['COUNT']==0) {
            return true;
        }
        else {
            return false;
        }
    }

    public static  function checkFilmByUserReiting($id_film,$id_user){
        $db = db::getConnection();
        $result = $db->query('SELECT COUNT(`id_operation`) AS COUNT FROM `films/users` WHERE `id_film`="'.$id_film.'" and `id_user`="'.$id_user.'"');
        $row = $result->fetch_assoc();
        if ($row['COUNT']==0) {
            return true;
        }
        else {
            return false;
        }
    }


    public static function addFilmInUser($id_film,$id_user,$status){
        $db = db::getConnection();
        $sql = 'INSERT INTO `films/users`(`id_film`, `id_user`, `status`) VALUES (?,?,?)';
        $result = $db->prepare($sql);
        $result->bind_param("sss",$id_film,$id_user,$status);
        return $result->execute();
    }


    public static function addFilmReting($id_film,$id_user,$reting){
        $db = db::getConnection();
        $sql = 'INSERT INTO `films/users`(`id_film`, `id_user`, `reiting`) VALUES (?,?,?)';
        $result = $db->prepare($sql);
        $result->bind_param("sss",$id_film,$id_user,$reting);
        return $result->execute();
    }




    public static function updateFilmInUser($id_film,$id_user,$status){
        $db = db::getConnection();
        $sql = 'UPDATE `films/users` SET `status`=? WHERE `id_film`=? and `id_user`=?';
        $result = $db->prepare($sql);
        $result->bind_param("sss",$status,$id_film,$id_user);
        return $result->execute();
    }
    public static function updateFilmReiting($id_film,$id_user,$reting){
        $db = db::getConnection();
        $sql = 'UPDATE `films/users` SET `reiting`=? WHERE `id_film`=? and `id_user`=?';
        $result = $db->prepare($sql);
        $result->bind_param("sss",$reting,$id_film,$id_user);
        return $result->execute();
    }
    public static function checkStatusFilm($id_film,$id_user){
        $db = db::getConnection();
        $sql = 'SELECT * FROM `films/users` WHERE `id_film`=? and `id_user`=?';
        $result = $db->prepare($sql);
        $result->bind_param("ss",$id_film,$id_user);
        $result->execute();
        $result->bind_result($row,$row2,$row3,$row4,$row5);
        $result ->fetch();
        return $row3;
    }
    public static function getFilmListUser($id_user,$status){
        $db =db::getConnection();

        $filmList = array();

        $result = $db->query("SELECT * FROM `films` INNER JOIN `films/users` ON `films/users`.id_film=films.id WHERE `films/users`.`id_user`= ".$id_user." and `films/users`.`status`=".$status." ORDER BY `films/users`.`id_operation` ASC");

        $i=0;
        while ($row = $result->fetch_assoc()){
            $filmList[$i]['id'] = $row['id'];
            $filmList[$i]['name'] = $row['name'];
            $filmList[$i]['year'] = $row['year'];
            $filmList[$i]['country'] = $row['country'];
            $filmList[$i]['producer_r+'] = $row['producer_r+'];
            $filmList[$i]['producer'] = $row['producer'];
            $filmList[$i]['scenario'] = $row['scenario'];
            $filmList[$i]['operator'] = $row['operator'];
            $filmList[$i]['composer'] = $row['composer'];
            $filmList[$i]['premiere'] = $row['premiere'];
            $filmList[$i]['age'] = $row['age'];
            $filmList[$i]['description'] = $row['description'];
            $filmList[$i]['genre'] = $row['genre'];
            $filmList[$i]['img'] = $row['img'];
            $filmList[$i]['status'] = $row['status'];
            $filmList[$i]['reiting'] = $row['reiting'];
            $i++;
        }
        return $filmList;
    }
    public static function checkReitingFilm($id_film){
        $db = db::getConnection();
        $result = $db->query('SELECT AVG(`reiting`) as AVG FROM `films/users` WHERE `id_film`= '.$id_film);
        $row = $result->fetch_assoc();

        return $row['AVG'];
    }
    public static function getFilmUserReiting($id_film,$id_user){
        $db = db::getConnection();
        $result = $db->query('SELECT `reiting` as reiting FROM `films/users` WHERE `id_film`= '.$id_film.' and `id_user`='.$id_user);
        $row = $result->fetch_assoc();
        return $row['reiting'];
    }
    public static function getCountFilm($id_user,$status){
        $db = db::getConnection();
        $result = $db->query('SELECT COUNT(`id_operation`) as COUNT FROM `films/users` WHERE `id_user`='.$id_user.' and `status`='.$status);
        $row = $result->fetch_assoc();

        return $row['COUNT'];
    }


    public static  function sendComment($id_user,$id_film,$content,$data_and_time,$id_comment_answer = 0,$id_parent = 0){
        $db = db::getConnection();
        $sql = 'INSERT INTO `user/comment`(`id_user`, `id_film`, `content`, `date_and_time`, `id_comment_answer`, `id_parent_comment`) VALUES (?,?,?,?,?,?)';
        $result = $db->prepare($sql);
        $result->bind_param("ssssss",$id_user,$id_film,$content,$data_and_time,$id_comment_answer,$id_parent);
        return $result->execute();
    }




    public static function getCommentsList($id_film){
        $db = db::getConnection();

        $sql ='SELECT `content`,`date_and_time`,img,login,`id_comment` FROM `user/comment` INNER JOIN `users` ON `users`.`id`=`user/comment`.`id_user` WHERE id_film='.$id_film.' 
 ORDER BY `user/comment`.`date_and_time`  DESC';
        $result = $db->query($sql);
        $commentList = array();
        $i=0;
        while ($row = $result->fetch_assoc()){
            $commentList[$i]['content'] = $row['content'];
            $commentList[$i]['date_and_time'] = $row['date_and_time'];
            $commentList[$i]['img'] = $row['img'];
            $commentList[$i]['login'] = $row['login'];
            $commentList[$i]['id_comment'] = $row['id_comment'];
            $i++;
        }
        return $commentList;
    }




    public static function getCountComments($id_film){
        $db = db::getConnection();

        $result = $db->query('SELECT COUNT(`id_comment`) as count FROM `user/comment` WHERE `id_film`='.$id_film);

        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function getCountCommentsById($id_film,$id_user){
        $db = db::getConnection();

        $result = $db->query('SELECT COUNT(`id_comment`) as count FROM `user/comment` WHERE `id_film`='.$id_film.' id_user= '.$id_user);

        $row = $result->fetch_assoc();
        return $row['count'];
    }


}