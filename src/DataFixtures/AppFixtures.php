<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName("jour 1");
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName("jour 2");
        $manager->persist($category2);


        for ($i=0; $i < 11; $i++) { 

            if( $i % 2 == 0 ){
                $category = $category1;
            } else {
                $category = $category2;
            }

            $article = new Article();
            $article->setTitre("titre".$i)
                    ->setContenu("contenu".$i)
                    ->setDatecreation(new DateTime())
                    ->setCategory($category);
            $manager->persist($article);
        }
       


        $manager->flush();
    }
}
