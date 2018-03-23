<div class="carte<?php echo $this->getStatutNom() ?>">
<a href=".?m=game&c=game&a=invoke&id=<?php echo $this->getId() ?>"><img src="web/images/<?php echo $this->getHerosNom() ?>/jpg-72-rvb/<?php echo $this->getIllustrationPath() ?>" alt=""></a>
    <div class="pictocout"><?php echo $this->getPrix() ?></div>
    <div class="pictoattaque"><?php echo $this->getDegat() ?></div>
    <div class="pictovie"><?php echo $this->getPv() ?></div>
</div>
