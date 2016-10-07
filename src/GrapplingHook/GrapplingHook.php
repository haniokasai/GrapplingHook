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
		
		$config = getConfig();
		$hookThreshold = config->getDouble("hook-threshold");
		$hForceMult = config->getDouble("horizontal-force-mult");
		$hForceMax = config->getDouble("horizontal-force-max");
		$vForceMult = config->getDouble("vertical-force-mult");
		$vForceBonus = config->getDouble("vertical-force-bonus");
		$vForceMax = config->getDouble("vertical-force-max");
		
		->saveDefaultConfig();
	
		getServer()->getPluginManager()->registerEvents(this, this);
	}
    public function onDisable(){
        $this->getLogger()->info("§a飛天鉤(GrapplingHook)已關閉");
    }
    
    public function onPlayerFish(PlayerFishEvent event){
	        Vector = vector3;
		Entity = entity;
		Block = block;
		Player = player;
		double = d;
	    
	        if (event->getState()->equals(PlayerFishEvent->State->IN_GROUND) || event->getState()->equals(PlayerFishEvent->State->FAILED_ATTEMPT)) {
			$entity = event->getHook();
			$block = entity->getWorld()->getBlockAt(entity->getLocation()->add(0.0, -hookThreshold, 0.0));
			
			if (!block->isEmpty() && !block->isLiquid()) {
				$player = event->getPlayer();
				
				$vector3 = entity->getLocation()->subtract(player->getLocation())->toVector();
				
				if ($vector3->getY() < 0.0)
					$vector3->setY(0.0);
				
				$vector3->setX($vector3->getX() * hForceMult);
				$vector3->setY($vector3->getY() * vForceMult + vForceBonus);
				$vector3->setZ($vector3->getZ() * hForceMult);
				
				d = hForceMax * hForceMax;
				if (vector3->clone()->setY(0.0)->lengthSquared() > d) {
					d = d / vector3->lengthSquared();
					$vector3->setX($vector3->getX() * d);
					$vector3->setZ($vector3->getZ() * d);
				}
				
				if ($vector3->getY()->vForceMax)
					$vector3->setY(vForceMax);
				
				player->setVelocity($vector3);
			}
		}
	}

}

		  
