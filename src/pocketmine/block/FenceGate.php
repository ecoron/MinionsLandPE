<?php

/*
 *
 *  _                       _           _ __  __ _             
 * (_)                     (_)         | |  \/  (_)            
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___  
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \ 
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/ 
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___| 
 *                     __/ |                                   
 *                    |___/                                                                     
 * 
 * This program is a third party build by ImagicalMine.
 * 
 * PocketMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.ml/
 * 
 *
*/

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;
use pocketmine\Player;
use pocketmine\level\sound\DoorSound;

class FenceGate extends Transparent implements Redstone{

	protected $id = self::FENCE_GATE;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Oak Fence Gate";
	}

	public function getHardness(){
		return 2;
	}

	public function canBeActivated(){
		return true;
	}

	public function getToolType(){
		return Tool::TYPE_AXE;
	}


	protected function recalculateBoundingBox(){

		if(($this->getDamage() & 0x04) > 0){
			return null;
		}

		$i = ($this->getDamage() & 0x03);
		if($i === 2 and $i === 0){
			return new AxisAlignedBB(
				$this->x,
				$this->y,
				$this->z + 0.375,
				$this->x + 1,
				$this->y + 1.5,
				$this->z + 0.625
			);
		}else{
			return new AxisAlignedBB(
				$this->x + 0.375,
				$this->y,
				$this->z,
				$this->x + 0.625,
				$this->y + 1.5,
				$this->z + 1
			);
		}
	}

	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null){
		$faces = [
			0 => 3,
			1 => 0,
			2 => 1,
			3 => 2,
		];
		$this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0] & 0x03;
		$this->getLevel()->setBlock($block, $this, true, true);

		return true;
	}

	public function getDrops(Item $item){
		return [
			[$this->id, 0, 1],
		];
	}

	public function onActivate(Item $item, Player $player = null){
		$faces = [
			0 => 3,
			1 => 0,
			2 => 1,
			3 => 2,
		];
		$this->meta = ($faces[$player instanceof Player ? $player->getDirection() : 0] & 0x03) | ((~$this->meta) & 0x04);
		$this->getLevel()->setBlock($this, $this, true);
		$this->getLevel()->addSound(new DoorSound($this));
		return true;
	}
	
	public function onRedstoneUpdate($PowerSource = null,$DirectPowerSource = null,$Power = 0){
		$checkRedstone=$this->isActivitedByRedstone();
		if ($checkRedstone and $this->meta < 4)
				$this->meta = $this->meta+4;
		$this->getLevel()->setBlock($this,$this);
		$this->getLevel()->addSound(new DoorSound($this));
	}
}
