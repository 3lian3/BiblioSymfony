<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoryFantasy = new Category();
        $categoryFantasy->setName('litterature fantastique');
        $manager->persist($categoryFantasy);
        $this->addReference('category-fantasy', $categoryFantasy);

        $categoryRomance = new Category();
        $categoryRomance->setName('Roman');
        $manager->persist($categoryRomance);
        $this->addReference('category-romance', $categoryRomance);

        $categorySelfHelp = new Category();
        $categorySelfHelp->setName('self-help');
        $manager->persist($categorySelfHelp);
        $this->addReference('category-self-help', $categorySelfHelp);

        $categoryThriller = new Category();
        $categoryThriller->setName('Thriller');
        $manager->persist($categoryThriller);
        $this->addReference('category-thriller', $categoryThriller);

        $categoryHistorical = new Category();
        $categoryHistorical->setName('Historique');
        $manager->persist($categoryHistorical);
        $this->addReference('category-historical', $categoryHistorical);

        $categoryScienceFiction = new Category();
        $categoryScienceFiction->setName('Science-fiction');
        $manager->persist($categoryScienceFiction);
        $this->addReference('category-science-fiction', $categoryScienceFiction);

        $categoryPolicier = new Category();
        $categoryPolicier->setName('Policier');
        $manager->persist($categoryPolicier);
        $this->addReference('category-policier', $categoryPolicier);

        $categoryComics = new Category();
        $categoryComics->setName('Comics');
        $manager->persist($categoryComics);
        $this->addReference('category-comics', $categoryComics);

        $categoryManga = new Category();
        $categoryManga->setName('Manga');
        $manager->persist($categoryManga);
        $this->addReference('category-manga', $categoryManga);

        $categorySatire = new Category();
        $categorySatire->setName('Satire');
        $manager->persist($categorySatire);
        $this->addReference('category-satire', $categorySatire);

        $categoryDrama = new Category();
        $categoryDrama->setName('Drame');
        $manager->persist($categoryDrama);
        $this->addReference('category-drama', $categoryDrama);

        $categoryHorror = new Category();
        $categoryHorror->setName('Horreur');
        $manager->persist($categoryHorror);
        $this->addReference('category-horror', $categoryHorror);

        $categoryPoetry = new Category();
        $categoryPoetry->setName('Poésie');
        $manager->persist($categoryPoetry);
        $this->addReference('category-poetry', $categoryPoetry);

        $categoryBiography = new Category();
        $categoryBiography->setName('Biographie');
        $manager->persist($categoryBiography);
        $this->addReference('category-biography', $categoryBiography);

        $categoryEssay = new Category();
        $categoryEssay->setName('Essai');
        $manager->persist($categoryEssay);
        $this->addReference('category-essay', $categoryEssay);

        $categoryJournal = new Category();
        $categoryJournal->setName('Journal');
        $manager->persist($categoryJournal);
        $this->addReference('category-journal', $categoryJournal);

        $categoryGuide = new Category();
        $categoryGuide->setName('Guide');
        $manager->persist($categoryGuide);
        $this->addReference('category-guide', $categoryGuide);

        $categoryCookbook = new Category();
        $categoryCookbook->setName('Livre de cuisine');
        $manager->persist($categoryCookbook);
        $this->addReference('category-cookbook', $categoryCookbook);

        $categoryChildren = new Category();
        $categoryChildren->setName('Livre pour enfant');
        $manager->persist($categoryChildren);
        $this->addReference('category-children', $categoryChildren);

        $categoryOther = new Category();
        $categoryOther->setName('Autre');
        $manager->persist($categoryOther);
        $this->addReference('category-other', $categoryOther);

        $manager->flush();
    }
}
