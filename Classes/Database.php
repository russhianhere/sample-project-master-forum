<?



Class DB_C{


    public static function RegisterUser(array $User){
        $mysqli = DBConf::Mysqli();

        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("INSERT INTO users (phone, firstname, lastname, type, digit_class, description, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiiss", $phone, $firstname, $lastname, $role, $digit_class, $desc, $password);


        $password = password_hash ($User['password'], PASSWORD_DEFAULT);
        $phone = strip_tags($User['phone']);
        $firstname = strip_tags($User['firstname']);
        $lastname = strip_tags($User['lastname']);
        $role = strip_tags($User['role']);
        $digit_class = strip_tags($User['digit_class']);
        $desc = strip_tags($User['description']);

        $stmt->execute();

        $stmt->close();

    }

    public static function PostComment($post,$text,$uid){
        $mysqli = DBConf::Mysqli();

        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM posts WHERE id = ? ");
        $stmt->bind_param("i", $post);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        $result = $result ['count'];

        if ($result != 0){

        $stmt = $mysqli->prepare("INSERT INTO comments (post, text, author) VALUES (?, ?, ?)");

        $stmt->bind_param("isi", $post, $text, $uid);
        $text = strip_tags($text);

        $stmt->execute();

        $stmt->close();

        }

    }


    public static function CntPhone ($phone){
        $mysqli = DBConf::Mysqli();

        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM users WHERE phone = ? ");
        $stmt->bind_param("s", $phone);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();
        $result = $result ['count'];

        return $result;




    }

    public static function PostsCnt ($id){
        $mysqli = DBConf::Mysqli();

        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM posts WHERE author = ? ");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();
        $result = $result ['count'];

        return $result;




    }


    public static function CntNickname ($nickname){
        $mysqli = DBConf::Mysqli();

        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM users WHERE phone = ? ");
        $stmt->bind_param("s", $nickname);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();
        $result = $result ['count'];

        return $result;




    }


    public static function VerifyUser (array $User){
        $mysqli = DBConf::Mysqli();

        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM users WHERE phone = ?");
        $stmt->bind_param("s", $phone);

        $phone = $User['phone'];

        $stmt->execute();

        $result = $stmt->get_result();


        $stmt->close();


        if($result = $result->fetch_assoc()){

            if (password_verify($User['password'], $result['password'])){


                $result['ok'] = TRUE;


            }

            else{


                $result['ok'] = FALSE;


            }



        }

        else{

            $result['ok'] = FALSE;

        }

        return $result;





    }


    public static function GetByID ($id){
        $mysqli = DBConf::Mysqli();


        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `users` WHERE id= ? ");
        $stmt->bind_param("s", $pid);

        $pid = $id;

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();

        return $result;








    }


    public static function GetPostsOfUser ($id){
        $mysqli = DBConf::Mysqli();


        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `posts` WHERE author= ? ORDER BY timestamp DESC");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($post = $result->fetch_assoc()){

            array_push ($Array, $post);


        }


        return $Array;


    }


    public static function GetNews (){
        $mysqli = DBConf::Mysqli();


        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `posts` WHERE news = 1 ORDER BY timestamp DESC");


        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($post = $result->fetch_assoc()){

            array_push ($Array, $post);


        }


        return $Array;








    }

    public static function GetPostByID ($id){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `posts` WHERE id = ?");
        $stmt->bind_param("i", $id);


        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($post = $result->fetch_assoc()){

            array_push ($Array, $post);


        }


        return $Array;








    }


    public static function AddPost(array $Post){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("INSERT INTO posts (author, text) VALUES (?, ?)");
        $stmt->bind_param("is", $author, $text);


        $text = strip_tags($Post['text']);
        $author = $Post['author'];

        $stmt->execute();

        $Id = $stmt->insert_id;

        $stmt->close();

        return $Id;

    }

    public static function PostTags($post,array $tags, $author){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("INSERT INTO post__tags (post, tag, author) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $post, $tag, $author);

        foreach ($tags as $tag) {

            $stmt->execute();

        }


        $stmt->close();


    }


    public static function VerifyTags($Tags,$exp){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM tags WHERE id = ? and exp_req <= ?");
        $stmt->bind_param("ii", $Tag, $exp);

        $tagstoret = array();

        foreach ($Tags as $Tag) {

            $stmt->execute();

            $result = $stmt->get_result();

            $result = $result->fetch_assoc();
            $result = $result ['count'];

            if ($result > 0){

                array_push($tagstoret, $Tag);

            }



        }

        return $tagstoret;



    }


    public static function GetTagsOfPost ($id){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `post__tags` WHERE post= ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($tag = $result->fetch_assoc()){

            $tag_body = $mysqli->prepare("SELECT * FROM `tags` WHERE id = ?");
            $tag_body->bind_param("i", $tagbodyid);
            $tagbodyid = $tag['tag'];
            $tag_body->execute();

            $tag_body_res = $tag_body->get_result();
            $tag_body->close();

            $tag_body_assoc = $tag_body_res->fetch_assoc();

            $full_tag = array_merge ($tag,$tag_body_assoc);


            array_push ($Array, $full_tag);


        }


        return $Array;








    }

    public static function GetTagsOfUser ($id){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT tag FROM `post__tags` WHERE author = ? GROUP BY tag ORDER BY COUNT(*) DESC LIMIT 10");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($tag = $result->fetch_assoc()){

            $tag_body = $mysqli->prepare("SELECT * FROM `tags` WHERE id = ?");
            $tag_body->bind_param("i", $tagbodyid);
            $tagbodyid = $tag['tag'];
            $tag_body->execute();

            $tag_body_res = $tag_body->get_result();
            $tag_body->close();

            $tag_body_assoc = $tag_body_res->fetch_assoc();

            $full_tag = array_merge ($tag,$tag_body_assoc);


            array_push ($Array, $full_tag);


        }


        return $Array;








    }



    public static function InsertTag($label)
    {


        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("INSERT INTO tags (label) VALUES (?)");
        $stmt->bind_param("s", $label);

        $label = strip_tags($label);

        $stmt->execute();


        $stmt->close();




    }


    public static function SetAvatar($url,$id)
    {


        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("UPDATE users SET avatar = ? WHERE id = ?");
        $stmt->bind_param("si", $url,$id);

        $stmt->execute();

        $stmt->close();




    }

    public static function Subscribe($sub, $profile)
    {

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM users WHERE id = ? ");
        $stmt->bind_param("i", $profile);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        $result = $result ['count'];

        if ($result != 0){

            if (!self::IsSub($sub,$profile)){

                $stmt = $mysqli->prepare("INSERT INTO subscribes (subscriber,profile) VALUES (?,?)");
                $stmt->bind_param("ii", $sub,$profile);

                $stmt->execute();

                $stmt->close();


            }

            else{

                $stmt = $mysqli->prepare("DELETE FROM subscribes WHERE subscriber = ? AND profile = ? LIMIT 1");
                $stmt->bind_param("ii", $sub,$profile);

                $stmt->execute();

                $stmt->close();

            }

        }




    }

    public static function IsSub($sub, $profile)
    {

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");
        $stmt = $mysqli->prepare("SELECT * FROM subscribes WHERE subscriber = ? AND profile = ?");
        $stmt->bind_param("ii", $sub,$profile);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        if ($result->num_rows == 0){

            return False;


        }

        else{

            return True;
        }




    }

    public static function CntSubscribers ($profile){


        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM subscribes WHERE profile = ? ");
        $stmt->bind_param("i", $profile);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();
        $result = $result ['count'];

        return $result;




    }


    public static function Rate($rateid, $post, $author)
    {


        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM posts WHERE id = ? ");
        $stmt->bind_param("i", $post);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result = $result->fetch_assoc();
        $result = $result ['count'];

        if ($result != 0){


            if (!self::IsRated($rateid, $post)){

                $stmt = $mysqli->prepare("INSERT INTO rates (user,post,author) VALUES (?,?,?)");
                $stmt->bind_param("iii", $rateid,$post,$author);

                $stmt->execute();

                $stmt->close();


            }

            else{

                $stmt = $mysqli->prepare("DELETE FROM rates WHERE user = ? AND post = ? LIMIT 1");
                $stmt->bind_param("ii", $rateid,$post);

                $stmt->execute();

                $stmt->close();

            }

        }



    }

    public static function IsRated($rateid, $post)
    {

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT * FROM rates WHERE user = ? AND post = ?");
        $stmt->bind_param("ii", $rateid,$post);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        if ($result->num_rows == 0){

            return False;


        }

        else{

            return True;
        }




    }

    public static function CntRatingUser ($author){


        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM rates WHERE author = ? ");
        $stmt->bind_param("i", $author);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();
        $result = $result ['count'];

        return $result;




    }

    public static function CntRatingPost ($post){


        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->prepare("SELECT COUNT(*) AS `count` FROM rates WHERE post = ? ");
        $stmt->bind_param("i", $post);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $result = $result->fetch_assoc();
        $result = $result ['count'];

        return $result;




    }


    public static function GetPostsOfUsers (array $id){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");


        $query = "SELECT * FROM posts WHERE ";

        $i = 0;
        $len = count($id);

        foreach ($id as $author) {

            if ($i == $len-1){

                $query .= "author = $author ORDER BY timestamp DESC";

            }

            else{

                $query .= "author = $author OR ";

            }

            $result = $mysqli->query($query);

            $i++;

        }

        $Array = array();

        while ($post = $result->fetch_assoc()){

            array_push ($Array, $post);

        }


        return $Array;


    }

    public static function GetComments ($id){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `comments` WHERE post= ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($post = $result->fetch_assoc()){

            array_push ($Array, $post);


        }


        return $Array;


    }



    public static function GetSubscribed ($id){

        $mysqli = DBConf::Mysqli();
        $mysqli->set_charset("utf8");


        $stmt = $mysqli->prepare("SELECT * FROM `subscribes` WHERE subscriber= ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        $Array = array();

        while ($post = $result->fetch_assoc()){

            array_push ($Array, $post['profile']);


        }


        return $Array;


    }






}






?>
