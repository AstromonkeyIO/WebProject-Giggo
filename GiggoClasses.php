<?php

class User {
    
    private $ID, $Username, $Photo, $Skill;
    
    
    
    
}




class Chat {
    
    private $ChatID, $ChatUserID, $ChatText; 
    
     public function SetChatID() {
        
        $this->ChatID = $ChatID;
        
    }
    
    public function SetChatUserID() {
        
        $this->ChatUserID = $ChatUserID;
  
    }
    
    public function SetChatText() {
        
        $this->ChatText = ChatText;
        
    } 
      
    public function GetChatID() {
        
        return $this->ChatID;
        
    }
    
    public function GetChatUserID() {
        
        return $this->ChatUserID;
  
    }
    
    public function GetChatText() {
        
        return $this->ChatText;
        
    }
    
    public function InsertChatMessage() {
        
        //include ('ConnectForChat.php');
        $bdd = new PDO("mysql:host = localhost; dbname:Chat", "root", "root");
        $req=$bdd->prepare("INSERT INTO Chats(ChatUserID, ChatText) VALUES (ChatUserID, ChatText)");
        $req->execute(array(
            'ChatUserId'=>$this->GetChatUserID(),
            'ChatText'=>$this->GetChatText()
        ));
        
    }
    
    
}



?>
