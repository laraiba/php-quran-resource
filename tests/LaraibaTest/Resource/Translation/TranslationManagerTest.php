<?php

namespace LaraibaTest\Resource\Translation;

use Laraiba\Resource\Translation\TranslationInterface;
use Laraiba\Resource\Translation\TranslationManager;

class TranslationManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $translationManager;

    public function setUp()
    {
        $this->translationManager = new TranslationManager();
    }

    public function testImplementsTranslationManagerInterface()
    {
        $this->assertInstanceOf(
            'Laraiba\Resource\Translation\TranslationManagerInterface',
            $this->translationManager
        );
    }

    public function testAddGetTranslation()
    {
        $translation = $this->getMock('Laraiba\Resource\Translation\TranslationInterface');

        $this->assertCount(0, $this->translationManager->getTranslations());
        $this->translationManager->addTranslation($translation);
        $this->assertCount(1, $this->translationManager->getTranslations());
    }

    public function testDefaultTranslationIsMutable()
    {
        $translation = $this->getMock('Laraiba\Resource\Translation\TranslationInterface');

        $this->assertNull($this->translationManager->getDefaultTranslation());
        $this->translationManager->setDefaultTranslation($translation);
        $this->assertSame($translation, $this->translationManager->getDefaultTranslation());
    }

    public function testAddTranslationSetDefaultUsingArgument()
    {
        $translation = $this->getMock('Laraiba\Resource\Translation\TranslationInterface');

        $this->assertNull($this->translationManager->getDefaultTranslation());
        $this->translationManager->addTranslation($translation, true);
        $this->assertSame($translation, $this->translationManager->getDefaultTranslation());
    }

    /**
     * @depends testAddTranslationSetDefaultUsingArgument
     * @depends testAddGetTranslation
     */
    public function testAddTranslationSetDefaultForTheFirstTranslation()
    {
        $translation1 = $this->getMock('Laraiba\Resource\Translation\TranslationInterface');
        $translation2 = $this->getMock('Laraiba\Resource\Translation\TranslationInterface');

        $this->assertNull($this->translationManager->getDefaultTranslation());
        $this->translationManager->addTranslation($translation1);
        $this->assertSame($translation1, $this->translationManager->getDefaultTranslation());
        $this->translationManager->addTranslation($translation2);
        $this->assertSame($translation1, $this->translationManager->getDefaultTranslation());
    }
}
