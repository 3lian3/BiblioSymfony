<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $authorTolkien = new Author();
        $authorTolkien->setFirstname('J.R.R.');
        $authorTolkien->setLastname('Tolkien');
        $manager->persist($authorTolkien);
        $this->addReference('author-tolkien', $authorTolkien);

        $authorGreen = new Author();
        $authorGreen->setFirstname('Rogert');
        $authorGreen->setLastname('Greene');
        $manager->persist($authorGreen);
        $this->addReference('author-greene', $authorGreen);

        $authorConan = new Author();
        $authorConan->setFirstname('Arthur');
        $authorConan->setLastname('Conan Doyle');
        $manager->persist($authorConan);
        $this->addReference('author-conan', $authorConan);

        $authorFitzgerald = new Author();
        $authorFitzgerald->setFirstname('F. Scott');
        $authorFitzgerald->setLastname('Fitzgerald');
        $manager->persist($authorFitzgerald);
        $this->addReference('author-fitzgerald', $authorFitzgerald);
        
        $authorWilde = new Author();
        $authorWilde->setFirstname('Oscar');
        $authorWilde->setLastname('Wilde');
        $manager->persist($authorWilde);
        $this->addReference('author-wilde', $authorWilde);

        $authorTzu = new Author();
        $authorTzu->setFirstname('Sun');
        $authorTzu->setLastname('Tzu');
        $manager->persist($authorTzu);
        $this->addReference('author-tzu', $authorTzu);

        $authorMachiavelli = new Author();
        $authorMachiavelli->setFirstname('Niccolò');
        $authorMachiavelli->setLastname('Machiavelli');
        $manager->persist($authorMachiavelli);
        $this->addReference('author-machiavelli', $authorMachiavelli);

        $manager->flush();
    }
}
