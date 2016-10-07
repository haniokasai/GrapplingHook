<?php

namespace grapplinghook;

use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginManager;
use pocketmine\Server;
use pocketmine\utils\Config;

class pressurejump extends PluginBase implements Listener{

	double hookThreshold;
	double hForceMult;
	double hForceMax;
	double vForceMult;
	double vForceBonus;
	double vForceMax;
	
	@Override
    public function onEnable(){
	FileConfiguration config;
		
		config = getConfig();
		hookThreshold = config.getDouble("hook-threshold");
		hForceMult = config.getDouble("horizontal-force-mult");
		hForceMax = config.getDouble("horizontal-force-max");
		vForceMult = config.getDouble("vertical-force-mult");
		vForceBonus = config.getDouble("vertical-force-bonus");
		vForceMax = config.getDouble("vertical-force-max");
		
		saveDefaultConfig();
	
		getServer()->getPluginManager()->registerEvents(this, this);
	}
    public function onDisable(){
        $this->getLogger()->info("§a飛天鉤(GrapplingHook)已關閉");
    }
    
    public function onPlayerFish(PlayerFishEvent event){
		  
