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

namespace pocketmine\item\enchantment;


class Enchantment{

	const TYPE_INVALID = -1;

	const TYPE_ARMOR_PROTECTION = 0;
	const TYPE_ARMOR_FIRE_PROTECTION = 1;
	const TYPE_ARMOR_FALL_PROTECTION = 2;
	const TYPE_ARMOR_EXPLOSION_PROTECTION = 3;
	const TYPE_ARMOR_PROJECTILE_PROTECTION = 4;
	const TYPE_ARMOR_THORNS = 7;
	const TYPE_WATER_BREATHING = 5;
	const TYPE_WATER_SPEED = 8;
	const TYPE_WATER_AFFINITY = 6;
	const TYPE_WEAPON_SHARPNESS = 9;
	const TYPE_WEAPON_SMITE = 10;
	const TYPE_WEAPON_ARTHROPODS = 11;
	const TYPE_WEAPON_KNOCKBACK = 12;
	const TYPE_WEAPON_FIRE_ASPECT = 13;
	const TYPE_WEAPON_LOOTING = 14;
	const TYPE_MINING_EFFICIENCY = 15;
	const TYPE_MINING_SILK_TOUCH = 16;
	const TYPE_MINING_DURABILITY = 17;
	const TYPE_MINING_FORTUNE = 18;
	const TYPE_BOW_POWER = 19;
	const TYPE_BOW_KNOCKBACK = 20;
	const TYPE_BOW_FLAME = 21;
	const TYPE_BOW_INFINITY = 22;
	const TYPE_FISHING_FORTUNE = 23;
	const TYPE_FISHING_LURE = 24;

	const RARITY_COMMON = 0;
	const RARITY_UNCOMMON = 1;
	const RARITY_RARE = 2;
	const RARITY_MYTHIC = 3;

	const ACTIVATION_EQUIP = 0;
	const ACTIVATION_HELD = 1;
	const ACTIVATION_SELF = 2;

	const SLOT_NONE = 0;
	const SLOT_ALL = 0b11111111111111;
	const SLOT_ARMOR = 0b1111;
	const SLOT_HEAD = 0b1;
	const SLOT_TORSO = 0b10;
	const SLOT_LEGS = 0b100;
	const SLOT_FEET = 0b1000;
	const SLOT_SWORD = 0b10000;
	const SLOT_BOW = 0b100000;
	const SLOT_TOOL = 0b111000000;
	const SLOT_HOE = 0b1000000;
	const SLOT_SHEARS = 0b10000000;
	const SLOT_FLINT_AND_STEEL = 0b10000000;
	const SLOT_DIG = 0b111000000000;
	const SLOT_AXE = 0b1000000000;
	const SLOT_PICKAXE = 0b10000000000;
	const SLOT_SHOVEL = 0b10000000000;
	const SLOT_FISHING_ROD = 0b100000000000;
	const SLOT_CARROT_STICK = 0b1000000000000;

	/** @var Enchantment[] */
	protected static $enchantments;

	public static function init(){
		self::$enchantments = new \SplFixedArray(256);

		self::$enchantments[self::TYPE_ARMOR_PROTECTION] = new Enchantment(self::TYPE_ARMOR_PROTECTION, "%enchantment.protect.all", self::RARITY_COMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);
		self::$enchantments[self::TYPE_ARMOR_FIRE_PROTECTION] = new Enchantment(self::TYPE_ARMOR_FIRE_PROTECTION, "%enchantment.protect.fire", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);
		self::$enchantments[self::TYPE_ARMOR_FALL_PROTECTION] = new Enchantment(self::TYPE_ARMOR_FALL_PROTECTION, "%enchantment.protect.fall", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_FEET);
		self::$enchantments[self::TYPE_ARMOR_EXPLOSION_PROTECTION] = new Enchantment(self::TYPE_ARMOR_EXPLOSION_PROTECTION, "%enchantment.protect.explosion", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);
		self::$enchantments[self::TYPE_ARMOR_PROJECTILE_PROTECTION] = new Enchantment(self::TYPE_ARMOR_PROJECTILE_PROTECTION, "%enchantment.protect.projectile", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);
		self::$enchantments[self::TYPE_ARMOR_THORNS] = new Enchantment(self::TYPE_ARMOR_THORNS, "%enchantment.thorns", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);
		self::$enchantments[self::TYPE_WATER_BREATHING] = new Enchantment(self::TYPE_WATER_BREATHING, "%enchantment.water.breathing", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_HEAD);
		self::$enchantments[self::TYPE_WATER_SPEED] = new Enchantment(self::TYPE_WATER_SPEED, "%enchantment.water.speed", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_FEET);
		self::$enchantments[self::TYPE_WATER_AFFINITY] = new Enchantment(self::TYPE_WATER_AFFINITY, "%enchantment.water.affinity", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_TOOL);
		self::$enchantments[self::TYPE_WEAPON_SHARPNESS] = new Enchantment(self::TYPE_WEAPON_SHARPNESS, "%enchantment.weapon.sharpness", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_SWORD);
		self::$enchantments[self::TYPE_WEAPON_SMITE] = new Enchantment(self::TYPE_WEAPON_SMITE, "%enchantment.weapon.smite", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_SWORD);
		self::$enchantments[self::TYPE_WEAPON_ARTHROPODS] = new Enchantment(self::TYPE_WEAPON_ARTHROPODS, "%enchantment.weapon.arthropods", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_SWORD);
		self::$enchantments[self::TYPE_WEAPON_KNOCKBACK] = new Enchantment(self::TYPE_WEAPON_KNOCKBACK, "%enchantment.weapon.knockback", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_SWORD);
		self::$enchantments[self::TYPE_WEAPON_FIRE_ASPECT] = new Enchantment(self::TYPE_WEAPON_FIRE_ASPECT, "%enchantment.weapon.fire", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_SWORD);
		self::$enchantments[self::TYPE_WEAPON_LOOTING] = new Enchantment(self::TYPE_WEAPON_LOOTING, "%enchantment.weapon.looting", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_SWORD);
		self::$enchantments[self::TYPE_MINING_EFFICIENCY] = new Enchantment(self::TYPE_MINING_EFFICIENCY, "%enchantment.mining.efficiency", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_PICKAXE);
		self::$enchantments[self::TYPE_MINING_SILK_TOUCH] = new Enchantment(self::TYPE_MINING_SILK_TOUCH, "%enchantment.mining.silktouch", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_PICKAXE);
		self::$enchantments[self::TYPE_MINING_DURABILITY] = new Enchantment(self::TYPE_MINING_DURABILITY, "%enchantment.mining.durability", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_TOOL);
		self::$enchantments[self::TYPE_MINING_FORTUNE] = new Enchantment(self::TYPE_MINING_FORTUNE, "%enchantment.mining.fortune", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_PICKAXE);
		self::$enchantments[self::TYPE_BOW_POWER] = new Enchantment(self::TYPE_BOW_POWER, "%enchantment.bow.power", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_BOW);
		self::$enchantments[self::TYPE_BOW_KNOCKBACK] = new Enchantment(self::TYPE_BOW_KNOCKBACK, "%enchantment.bow.knockback", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_BOW);
		self::$enchantments[self::TYPE_BOW_FLAME] = new Enchantment(self::TYPE_BOW_FLAME, "%enchantment.bow.flame", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_BOW);
		self::$enchantments[self::TYPE_BOW_INFINITY] = new Enchantment(self::TYPE_BOW_INFINITY, "%enchantment.bow.infinity", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_BOW);
		self::$enchantments[self::TYPE_FISHING_FORTUNE] = new Enchantment(self::TYPE_FISHING_FORTUNE, "%enchantment.fishing.fortune", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_FISHING_ROD);
		self::$enchantments[self::TYPE_FISHING_LURE] = new Enchantment(self::TYPE_FISHING_LURE, "%enchantment.fishing.lure", self::RARITY_UNCOMMON, self::ACTIVATION_HELD, self::SLOT_FISHING_ROD);
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public static function getEnchantment($id){
		if(isset(self::$enchantments[$id])){
			return clone self::$enchantments[(int) $id];
		}
		return new Enchantment(self::TYPE_INVALID, "unknown", 0, 0, 0);
	}

	public static function getEnchantmentByName($name){
		if(defined(Enchantment::class . "::TYPE_" . strtoupper($name))){
			return self::getEnchantment(constant(Enchantment::class . "::TYPE_" . strtoupper($name)));
		}
		return null;
	}

	private $id;
	private $level = 1;
	private $name;
	private $rarity;
	private $activationType;
	private $slot;

	private function __construct($id, $name, $rarity, $activationType, $slot){
		$this->id = (int) $id;
		$this->name = (string) $name;
		$this->rarity = (int) $rarity;
		$this->activationType = (int) $activationType;
		$this->slot = (int) $slot;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getRarity(){
		return $this->rarity;
	}

	public function getActivationType(){
		return $this->activationType;
	}

	public function getSlot(){
		return $this->slot;
	}

	public function hasSlot($slot){
		return ($this->slot & $slot) > 0;
	}

	public function getLevel(){
		return $this->level;
	}

	public function setLevel($level){
		$this->level = (int) $level;

		return $this;
	}

}
