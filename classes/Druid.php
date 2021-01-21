<?php 

class Druid extends Character
{
    private $heal = false;
    private $countForest = 0;
    public function attack($target) {
        $rand = rand(1, 10);
        $attack = rand(5, 15);

        if (1 < $rand && $rand <= 4 && $this->countForest == 0) {
            return $this->forestForce();
        }else if ($rand == 1) {
            $status = $this->heal();
        } else {
            $status = $this->boStaff($target);
        }
        return $status;
    }

    private function forestForce(){
        $this->countForest = 3;
        $status = "{$this->name} appel les forces de la nature pour devenir plus puissant!";
        return $status;
    }

    private function boStaff($target){
        $attack = rand(5, 15);
        if ($this->countForest > 0){
            $target->setLifePoints($attack*1.5);
            $this->countForest--;
        } else {
            $target->setLifePoints($attack);
        }
        $status = "$this->name attaque {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        return $status;
    }
    
    private function heal(){
        $this->heal = true;
        $this->setLifePoints($this->heal);
        $status = "$this->name se soigne et récupère tous ses points de vies !";
        return $status;
    }

    public function setLifePoints($dmg) {
        if ($this->heal) {
            $this->lifePoints = 100;
            $this->heal = False;
        }
        
        $this->lifePoints -= round($dmg);
        if ($this->lifePoints < 0) {
            $this->lifePoints = 0;
        }
        return;
    }

}