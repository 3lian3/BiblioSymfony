<?php

namespace App\DataFixtures;

use App\Entity\Editor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EditorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $editorAllen = new Editor();
        $editorAllen->setName('Allen & Unwin');
        $manager->persist($editorAllen);
        $this->addReference('editor-allen', $editorAllen);

        $editorProfile = new Editor();
        $editorProfile->setName('Profile Books');
        $manager->persist($editorProfile);
        $this->addReference('editor-profile', $editorProfile);

        $editorWardLock = new Editor();
        $editorWardLock->setName('Ward Lock & Co');
        $manager->persist($editorWardLock);
        $this->addReference('editor-wardlock', $editorWardLock);

        $editorCharlesScribner = new Editor();
        $editorCharlesScribner->setName('Charles Scribner\'s Sons');
        $manager->persist($editorCharlesScribner);
        $this->addReference('editor-charles-scribner', $editorCharlesScribner);

        $editorPenguin = new Editor();
        $editorPenguin->setName('Penguin Books');
        $manager->persist($editorPenguin);
        $this->addReference('editor-penguin', $editorPenguin);

        $manager->flush();
    }
}
