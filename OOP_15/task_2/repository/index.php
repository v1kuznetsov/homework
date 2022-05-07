<?php
    $mytown = ($_POST["town"]);

    class FunctionsForGame {
  
      private $mytown;

      private $town;

      private $stop;
  
      public function __construct(string $mytown)
      {
        $sql = "SELECT letter FROM currentchar";
        $res = mysqli_query(self::MySQL(), $sql);
        foreach ($res as $val)
        {
          foreach ($val as $letter)
          {
            $result = $letter;
          }
        }
        if (mb_strtoupper($result) == mb_strtoupper(mb_substr($mytown, 0, 1)))
        {
          $sql = "SELECT EXISTS(SELECT id FROM existtowns WHERE name = '$mytown')";
          $result = mysqli_query(self::MySQL(), $sql);
          foreach ($result as $val)
          {
            foreach ($val as $check) 
            {
              if ($check == 1) 
              {
                $this->stop = 0;
                echo "Город уже был";
                return false;
              }
              else 
              {
                $this->stop = 1;
                $this->mytown = $mytown;
                $sql = "INSERT INTO existtowns (name) VALUES ('$mytown')";
                mysqli_query(self::MySQL(), $sql);
              }
            }
          }
        }
        else
        {
          $this->stop = 0;
          echo "Не жульничай)))";
          return false;
        }
      }
  
      public static function MySQL ()
      {
        return mysqli_connect ('localhost', 'admin', 'password', 'towns');
      }
  
      public function getLastChar (): string
      {
        return mb_strtoupper(mb_substr($this->mytown, -1, 1)); 
      }
  
      public function getRespond (): string
    {
        $lastchar = $this->getLastChar();
        $sql = "SELECT name FROM townsingame";
        $result = mysqli_query(self::MySQL(), $sql);

        foreach ($result as $val)
        {
          foreach ($val as $town)
          {
            if ($lastchar == mb_substr($town, 0, 1))
            {
              $sql = "SELECT EXISTS(SELECT id FROM existtowns WHERE name = '$town')";
              $result = mysqli_query(self::MySQL(), $sql);
              foreach ($result as $val)
              {
                foreach ($val as $check)
                {
                  if (!$check == 1)
                  {
                    $sql = "INSERT INTO existtowns (name) VALUES ('$town')";
                    mysqli_query(self::MySQL(), $sql);
                    return $this->town = $town;
                  }
                }
              }
            }
          }
        } return "You WON!";
      }
  
      public function getlastCharForMe (): string
      {
        if ($this->stop == 1)
        {
          $res = mb_substr($this->town, -1, 1);
          $sql = "UPDATE currentchar SET letter = '$res' WHERE id = 1";
          mysqli_query(self::MySQL(), $sql);
          return $res;
        }
      }
    }
    
    $start = new FunctionsForGame ("$mytown");
    
    $respond = $start->getRespond();
    
    $lastCharForMe = $start->getlastCharForMe();
    
  ?>