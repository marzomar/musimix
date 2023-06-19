<?php

namespace App\DataFixtures;

use App\Entity\Music;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        
        // tag rap
        $tag = new Tag();
        $tag->setName('Rap');
        $tag->setSlug('rap');
        $manager->persist($tag);
        $this->addReference('tag-rap', $tag);

        // tag rock
        $tag = new Tag();
        $tag->setName('Rock');
        $tag->setSlug('rock');
        $manager->persist($tag);
        $this->addReference('tag-rock', $tag);

        // tag pop
        $tag = new Tag();
        $tag->setName('Pop');
        $tag->setSlug('pop');
        $manager->persist($tag);
        $this->addReference('tag-pop', $tag);

        // tag electro
        $tag = new Tag();
        $tag->setName('Electro');
        $tag->setSlug('electro');
        $manager->persist($tag);
        $this->addReference('tag-electro', $tag);

        // tag jazz
        $tag = new Tag();
        $tag->setName('Jazz');
        $tag->setSlug('jazz');
        $manager->persist($tag);
        $this->addReference('tag-jazz', $tag);

        // tag metal
        $tag = new Tag();
        $tag->setName('Metal');
        $tag->setSlug('metal');
        $manager->persist($tag);
        $this->addReference('tag-metal', $tag);

        // tag reggae
        $tag = new Tag();
        $tag->setName('Reggae');
        $tag->setSlug('reggae');
        $manager->persist($tag);
        $this->addReference('tag-reggae', $tag);

        // user: admin
        $user = new User();
        $user->setEmail('admin@localhost.dev');
        $user->setPassword($this->encoder->hashPassword($user, 'admin'));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('admin');
        $user->setDescription('admin');
        $user->setType('admin');
        $user->setSlug('admin');
        $manager->persist($user);
        $this->addReference('user-admin', $user);

        // user: artist
        $user = new User();
        $user->setEmail('artist@localhost.dev');
        $user->setPassword($this->encoder->hashPassword($user, 'artist'));
        $user->setRoles(['ROLE_USER']);
        $user->setName('artist');
        $user->setDescription('artist');
        $user->setType('artist');
        $user->setSlug('artist');
        $user->addTag($this->getReference('tag-rap'));
        $user->addTag($this->getReference('tag-pop'));
        $manager->persist($user);
        $this->addReference('user-artist', $user);

        // user: sponsor
        $user = new User();
        $user->setEmail('sponsor@localhost.dev');
        $user->setPassword($this->encoder->hashPassword($user, 'sponsor'));
        $user->setRoles(['ROLE_USER']);
        $user->setName('sponsor');
        $user->setDescription('sponsor');
        $user->setType('sponsor');
        $user->setSlug('sponsor');
        $manager->persist($user);
        $this->addReference('user-sponsor', $user);


        /*
        	id Primaire	int			Non	Aucun(e)		AUTO_INCREMENT	Modifier Modifier	Supprimer Supprimer	
	2	user_id Index	int			Oui	NULL			Modifier Modifier	Supprimer Supprimer	
	3	title	varchar(255)	utf8mb4_unicode_ci		Non	Aucun(e)			Modifier Modifier	Supprimer Supprimer	
	4	description	varchar(255)	utf8mb4_unicode_ci		Oui	NULL			Modifier Modifier	Supprimer Supprimer	
	5	image	varchar(255)	utf8mb4_unicode_ci		Oui	NULL			Modifier Modifier	Supprimer Supprimer	
	6	src	varchar(255)	utf8mb4_unicode_ci		Non	Aucun(e)			Modifier Modifier	Supprimer Supprimer	
	7	slug	varchar(255)	utf8mb4_unicode_ci		Non	Aucun(e)		
    */

        // music 1 rap
        $music = new Music();
        $music->setTitle('exemple rap');
        $music->setDescription('blablabla');
        $music->setImage('https://picsum.photos/400/300');
        $music->setSrc('https://www.youtube.com/watch?v=wlmUM_d7ek0');
        $music->setSlug('exemple-rap');
        $music->addTag($this->getReference('tag-rap'));
        $music->setUser($this->getReference('user-artist'));
        $music->addFavoritedBy($this->getReference('user-sponsor'));
        $manager->persist($music);

        // music 2 rock
        $music = new Music();
        $music->setTitle('exemple rock');
        $music->setDescription('blablabla');
        $music->setImage('https://picsum.photos/400/300');
        $music->setSrc('https://www.youtube.com/watch?v=wlmUM_d7ek0');
        $music->setSlug('exemple-rock');
        $music->addTag($this->getReference('tag-rock'));
        $music->setUser($this->getReference('user-artist'));
        $music->addFavoritedBy($this->getReference('user-admin'));
        $manager->persist($music);

        // music 3 pop
        $music = new Music();
        $music->setTitle('exemple pop');
        $music->setDescription('blablabla');
        $music->setImage('https://picsum.photos/400/300');
        $music->setSrc('https://www.youtube.com/watch?v=wlmUM_d7ek0');
        $music->setSlug('exemple-pop');
        $music->addTag($this->getReference('tag-pop'));
        $music->setUser($this->getReference('user-artist'));
        $music->addFavoritedBy($this->getReference('user-admin'));
        $manager->persist($music);

        // music 4 electro
        $music = new Music();
        $music->setTitle('exemple electro');
        $music->setDescription('blablabla');
        $music->setImage('https://picsum.photos/400/300');
        $music->setSrc('https://www.youtube.com/watch?v=wlmUM_d7ek0');
        $music->setSlug('exemple-electro');
        $music->addTag($this->getReference('tag-electro'));
        $music->setUser($this->getReference('user-artist'));
        $music->addFavoritedBy($this->getReference('user-sponsor'));
        $manager->persist($music);

        // music 5 jazz
        $music = new Music();
        $music->setTitle('exemple jazz');
        $music->setDescription('blablabla');
        $music->setImage('https://picsum.photos/400/300');
        $music->setSrc('https://www.youtube.com/watch?v=wlmUM_d7ek0');
        $music->setSlug('exemple-jazz');
        $music->addTag($this->getReference('tag-jazz'));
        $music->setUser($this->getReference('user-artist'));
        $music->addFavoritedBy($this->getReference('user-admin'));
        $manager->persist($music);

        // music 6 metal
        $music = new Music();
        $music->setTitle('exemple metal');
        $music->setDescription('blablabla');
        $music->setImage('https://picsum.photos/400/300');
        $music->setSrc('https://www.youtube.com/watch?v=wlmUM_d7ek0');
        $music->setSlug('exemple-metal');
        $music->addTag($this->getReference('tag-metal'));
        $music->setUser($this->getReference('user-artist'));
        $music->addFavoritedBy($this->getReference('user-sponsor'));
        $manager->persist($music);

        $manager->flush();
    }
}
