<?php

namespace grapplinghook;

use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginManager;
use pocketmine\Server;
use pocketmine\utils\Config;

class pressurejump extends PluginBase implements Listener{

    public function onEnable(){
		    public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      if(!file_exists($this->getDataFolder())){
        $this->getLogger()->info("§b建立GrapplingHook資料夾中!");
        @mkdir($this->saveDataFolder());
	  }
    public function onDisable(){
        $this->getLogger()->info("§a飛天鉤(GrapplingHook)已關閉");
    }
    
    public function 
		  