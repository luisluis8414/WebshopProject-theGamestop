-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jun 2023 um 18:20
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dbs7368457`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `id` int(11) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `land` varchar(50) NOT NULL,
  `plz` varchar(10) NOT NULL,
  `downloadtyp` varchar(50) NOT NULL,
  `zahlungsmethode` varchar(50) NOT NULL,
  `kartenname` varchar(100) DEFAULT NULL,
  `kartennummer` varchar(100) DEFAULT NULL,
  `kartenablauf` varchar(10) DEFAULT NULL,
  `cvv` varchar(10) DEFAULT NULL,
  `bestelldatum` timestamp NOT NULL DEFAULT current_timestamp(),
  `totalSum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`id`, `vorname`, `nachname`, `email`, `adresse`, `land`, `plz`, `downloadtyp`, `zahlungsmethode`, `kartenname`, `kartennummer`, `kartenablauf`, `cvv`, `bestelldatum`, `totalSum`) VALUES
(103, 'Luis', 'Wehrberger', 'wehrbergerluis@gmail.com', 'Rapenhaldestrasse 10', 'Germany', '72762', 'Downloadlink', 'Credit card', 'Luis Wehrberger', '505 0505', '20/66', '5450', '2023-06-29 15:54:43', 371),
(104, 'Luis', 'Wehrberger', 'wehrbergerluis@gmail.com', 'Rapenhaldestrasse 10', 'Germany', '72762', 'Downloadlink', 'PayPal', '', '', '', '', '2023-06-29 15:55:25', 55);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungsitems`
--

CREATE TABLE `bestellungsitems` (
  `orderId` int(11) DEFAULT NULL,
  `itemId` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Daten für Tabelle `bestellungsitems`
--

INSERT INTO `bestellungsitems` (`orderId`, `itemId`, `quantity`) VALUES
(103, 3, 1),
(103, 4, 4),
(103, 5, 6),
(104, 3, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `imagePath` varchar(40) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `imagePath`, `quantity`, `type`) VALUES
(3, 'Leviathor', 'Abyssal Colossus', '7.99', '../../src/pictures/Leviathor.png', 10, 'monster'),
(4, 'Vesper Bloodbane', 'Vesper Bloodbane is a formidable and feared Blood Knight, adorned in dark, crimson armor that bears the marks of countless battles. With a commanding presence, this warrior radiates an aura of both elegance and brutality. Their eyes burn with a piercing crimson glow, reflecting the insatiable thirst for combat and the power coursing through their veins.\r\n\r\nVesper wields a wickedly sharp blade known as \"Sanguisurge,\" a weapon forged from the essence of fallen foes. Each strike is executed with precision and deadly intent, leaving a trail of crimson in its wake. Blood magic flows within their veins, enhancing their strength, speed, and endurance, transforming them into an unstoppable force on the battlefield.\r\n\r\nDriven by a relentless pursuit of victory, Vesper channels their insatiable bloodlust into combat, instilling fear in the hearts of their enemies. With each fallen adversary, their power grows, feeding into a symbiotic bond between their relentless spirit and the lifeblood spilled on the battlefield.\r\n\r\nVesper Bloodbane stands as a testament to the relentless nature of the Blood Knights, a force to be reckoned with, and a harbinger of blood-soaked victory.', '25.77', '../../src/pictures/BloodKnight.png', 4, 'char'),
(5, 'Aetherios the Eternal', 'Aetherios the Eternal is an ancient and revered dragon, embodying the essence of divine power and wisdom. Towering above the realms, its immense form is adorned with shimmering scales that reflect a kaleidoscope of ethereal hues, evoking a sense of awe and majesty. Its serpentine body twists and coils in graceful movements, exuding an aura of ancient knowledge and mystical energy.\r\n\r\nWith wings spanning vast distances, Aetherios takes to the skies with effortless grace, commanding storms and celestial forces at will. The very air crackles with power as it breathes forth cascades of radiant energy, imbued with the essence of creation and destruction. Legends speak of its fiery breath, capable of reducing mountains to ashes or freezing seas to ice with a mere exhale.\r\n\r\nAetherios is revered as a deity by many, worshipped for its divine influence and role in shaping the cosmos. Its eyes, deep pools of cosmic energy, hold profound wisdom and a sense of all-encompassing awareness. It is said that those who gaze into its eyes gain glimpses of forgotten truths and untold secrets of the universe.\r\n\r\nAs the embodiment of ancient divinity and primordial might, Aetherios the Eternal is a being to be both feared and revered, an otherworldly presence that transcends mortal understanding, and a force capable of shaping the very fabric of existence.', '54.77', '../../src/pictures/AncientDragon.png', 6, 'dragon'),
(6, 'Morosia, the Soul Harbinger', 'Morosia, known as the Soul Harbinger, is a chilling and enigmatic Death Angel, draped in flowing black robes that seem to meld with the shadows themselves. Their presence evokes a sense of profound mystery and foreboding. With ebony wings that span wide, they soar through the night sky, swift and silent, like an omen of impending doom.\r\n\r\nMorosia\'s visage is obscured by a featureless mask, devoid of any discernible emotion or expression, lending an air of otherworldly detachment. They wield a pair of gleaming scythes, honed to perfection, with blades that shimmer with an ethereal glow. Each swing of these weapons is precise and deadly, severing the threads of life and guiding lost souls to their final destination.\r\n\r\nRadiating an aura of deathly energy, Morosia has dominion over the spirits of the departed. They can call upon the shadows to cloak their movements, moving unnoticed until it is too late for their victims. With a touch, they can drain the life force from their foes, extinguishing the very essence of vitality.\r\n\r\nWhispers of their arrival echo through the realms, for Morosia is the messenger of death, a bringer of souls to the afterlife. They are an embodiment of the finality of mortality, a reminder that all things must succumb to the embrace of the eternal slumber.\r\n\r\nIn the realm of darkness and souls, Morosia, the Soul Harbinger, stands as a figure both feared and respected, a specter of death that haunts the living and guides the departed to their eternal rest.', '24.99', '../../src/pictures/DeathAngel.png', 3, 'char'),
(7, 'Arachnathor, the Webweaver', 'Arachnathor, the Webweaver, is a colossal spider of ancient origin, its intimidating presence casting a foreboding shadow across the land. With a sleek, obsidian-black exoskeleton shimmering under moonlight, it boasts multiple pairs of eyes, each gleaming with an unsettling, piercing gaze. Its massive, hairy legs sprawl outwards, enabling it to traverse any terrain with unmatched agility and precision.\r\n\r\nArachnathor spins intricate webs of extraordinary strength, weaving a network that ensnares both prey and unsuspecting adventurers. The strands glisten with an eerie luminescence, providing an ethereal glow amidst the darkness. It moves with calculated grace, it\'s every movement deliberate and deliberate, as if it were conducting a macabre symphony of entrapment.\r\n\r\nFrom its fearsome mandibles, venomous fangs protrude, ready to inject paralyzing toxins into any who dare challenge its domain. Its potent venom sends shivers down the spines of those unfortunate enough to cross its path, ensuring a swift and merciless demise.\r\n\r\nKnown as the master of ambush, Arachnathor lurks within its labyrinthine lair, patiently awaiting its next victim. Legends whisper of treasures ensnared within its webbed chambers, tempting the brave and foolhardy to brave the treacherous depths where the spider\'s reign is absolute.\r\n\r\nArachnathor, the Webweaver, is an embodiment of primal fear and predatory cunning, a formidable arachnid of immense size and deadly prowess. Its presence serves as a chilling reminder of nature\'s dark and mysterious forces, forever weaving its intricate webs in the realms of both shadow and nightmare.', '4.99', '../../src/pictures/spider.png', 71, 'monster'),
(8, 'Sable Thornrider', 'Shadowveil is a formidable black assassin, a figure shrouded in darkness and mystery. They move with unearthly grace, their steps silent and precise, blending seamlessly into the shadows that surround them. Adorned in sleek, form-fitting obsidian armor that melds with the night, they are a specter of death cloaked in the veils of stealth.\r\n\r\nWith piercing, unyielding eyes that burn like smoldering embers, Shadowveil possesses an unwavering focus and a keen intellect. Their every movement is calculated, honed through years of training in the deadly arts. A master of deception and infiltration, they possess an arsenal of hidden blades, lethal poisons, and intricate gadgets, all designed to dispatch their targets swiftly and discreetly.\r\n\r\nShadowveil is a ghost in the night, effortlessly traversing rooftops, scaling walls, and slipping through the tightest of security. They strike from the shadows, dispatching their enemies with lethal precision before retreating once more into the darkness. Their mastery of stealth and subterfuge makes them a nightmare for those who would cross their path.\r\n\r\nWhispers abound of their involvement in high-stakes political intrigues, assassinations of powerful figures, and acts of sabotage. Their true motives and allegiance remain elusive, their enigmatic nature fueling speculation and fear among those who know of their existence.\r\n\r\nShadowveil, the enigmatic black assassin, is a harbinger of death, a shadowy figure who strikes fear into the hearts of their targets and leaves no trace of their actions behind. To encounter them is to face the swift and silent hand of inevitable demise.\r\n\r\n\r\n\r\n\r\n\r\nUser\r\nNow a story for a Sable Thornrider\r\nChatGPT\r\nIn the arid wastelands of Vastoria, where blistering sunsets paint the sky with hues of fiery orange and the shifting dunes hold ancient secrets, a legend was born. The legend of the Sable Thornrider.\r\n\r\nIn a\r\n\r\n\r\n\r\nStop generating', '12.99', '../../src/pictures/SableThornrider.png', 12, 'mount, char'),
(9, 'Shadowveil', 'Shadowveil is a formidable black assassin, a figure shrouded in darkness and mystery. They move with unearthly grace, their steps silent and precise, blending seamlessly into the shadows that surround them. Adorned in sleek, form-fitting obsidian armor that melds with the night, they are a specter of death cloaked in the veils of stealth.\r\n\r\nWith piercing, unyielding eyes that burn like smoldering embers, Shadowveil possesses an unwavering focus and a keen intellect. Their every movement is calculated, honed through years of training in the deadly arts. A master of deception and infiltration, they possess an arsenal of hidden blades, lethal poisons, and intricate gadgets, all designed to dispatch their targets swiftly and discreetly.\r\n\r\nShadowveil is a ghost in the night, effortlessly traversing rooftops, scaling walls, and slipping through the tightest of security. They strike from the shadows, dispatching their enemies with lethal precision before retreating once more into the darkness. Their mastery of stealth and subterfuge makes them a nightmare for those who would cross their path.\r\n\r\nWhispers abound of their involvement in high-stakes political intrigues, assassinations of powerful figures, and acts of sabotage. Their true motives and allegiance remain elusive, their enigmatic nature fueling speculation and fear among those who know of their existence.\r\n\r\nShadowveil, the enigmatic black assassin, is a harbinger of death, a shadowy figure who strikes fear into the hearts of their targets and leaves no trace of their actions behind. To encounter them is to face the swift and silent hand of inevitable demise.', '34.99', '../../src/pictures/Shadowveil.png', 23, 'char'),
(10, 'Ashenbane', 'Long ago, in the age when kingdoms rose and fell like embers in the wind, there existed a grand kingdom known as Lysandria. This prosperous realm was known for its remarkable alliance between humans and dragons, fostering a harmonious coexistence between the two races.\r\n\r\nAt the heart of Lysandria stood Ashenbane, a mighty dragon of radiant beauty and unparalleled strength. With scales as brilliant as the rising sun and wings that blazed with the fires of life, Ashenbane was revered as the embodiment of grace and power. The people of Lysandria looked upon the dragon with awe and adoration, as it safeguarded the kingdom and its inhabitants with unwavering loyalty.\r\n\r\nBut darkness lurked beneath the surface, patiently biding its time. The kingdom\'s harmony faced a sinister threat, as an envious sorcerer named Malachor sought to harness the power of the dragons for his own nefarious purposes. Driven by greed and the desire for absolute power, he delved into forbidden magics, unraveling ancient curses and incantations.\r\n\r\nIn a desperate bid to bend the dragons to his will, Malachor cast a powerful curse upon Ashenbane. The curse seeped into the dragon\'s very essence, corrupting its noble heart and turning its radiant scales into a lifeless gray. Its once fiery breath transformed into a toxic miasma, capable of draining the life force from all it touched.\r\n\r\nAshenbane, now an undead entity bound to the will of its cursed existence, became a harrowing presence, instilling fear and despair in the hearts of all who beheld it. The skies of Lysandria darkened with sorrow, and the kingdom\'s alliance with the dragons shattered, for fear of the curse\'s spreading influence.\r\n\r\nThe people of Lysandria, mourning the loss of their beloved guardian, were torn between despair and hope. They desperately sought a way to break the curse and restore Ashenbane to its former glory. Thus, a group of brave heroes, known as the Loreseekers, embarked on a perilous quest to uncover the ancient knowledge needed to lift the curse that plagued Ashenbane.\r\n\r\nTheir journey took them through treacherous lands, where they encountered powerful beings and faced countless trials. Along the way, they pieced together fragments of forgotten lore, discovering that the key to breaking the curse lay within the ruins of an ancient temple, hidden in the heart of the Forbidden Forest.\r\n\r\nThrough perilous battles and selfless acts, the Loreseekers reached the temple, where they encountered Malachor himself, who sought to claim the power of Ashenbane for his own malevolent purposes. In a climactic showdown, the heroes fought with unwavering determination, their resolve fueled by the hope of restoring Ashenbane and saving their kingdom.\r\n\r\nWith their combined strength, the Loreseekers managed to break Malachor\'s hold over Ashenbane, freeing the dragon from the curse that had plagued it for so long. As the curse dissipated, the dragon\'s scales regained their lustrous brilliance, and its fiery breath once again became a symbol of life and renewal.\r\n\r\nReunited with the people of Lysandria, Ashenbane soared through the skies once more, a testament to the enduring spirit of resilience and the power of redemption. The kingdom of Lysandria celebrated its triumphant return, and the bond between dragons and humans was renewed, stronger than ever.\r\n\r\nAshenbane, forever carrying the scars of its cursed past, became a guardian and symbol of hope for Lysandria. Its tale endured as a cautionary reminder of the consequences of unchecked ambition, but also as a testament to the power of courage and unity to overcome even the darkest of curses. The name Ash', '24.99', '../../src/pictures/Ashenbane.png', 3, 'dragon'),
(11, 'Baphomet\'s Crown', 'In the annals of ancient mythology, there existed a deity known as Baphomet, a god of knowledge, fertility, and wisdom. This enigmatic figure was depicted as a half-human, half-goat entity, possessing great powers of divination and arcane mastery. Legends spoke of Baphomet\'s vast wisdom and the secrets held within the deity\'s goat-like countenance.\r\n\r\nDuring a time of great turmoil, when mortals sought guidance and protection from the ever-looming darkness, a gifted artisan named Alaric embarked on a journey to create a talisman of immeasurable power. Inspired by the divine presence of Baphomet, Alaric crafted a majestic artifact known as Baphomet\'s Crown.\r\n\r\nBaphomet\'s Crown was fashioned from the very skull of the divine goat-like god, a relic believed to hold a fraction of Baphomet\'s celestial essence. The talisman\'s intricate design reflected the intricate patterns found within the constellations, with gems embedded in the eye sockets that shimmered with ethereal energy.\r\n\r\nIt was said that whoever possessed Baphomet\'s Crown would gain unparalleled insight into the mysteries of the cosmos, unlocking the ancient knowledge and the secrets of the divine. The talisman became a conduit for Baphomet\'s wisdom, bestowing upon its wearer profound wisdom, heightened perception, and the ability to perceive hidden truths.\r\n\r\nThroughout the ages, Baphomet\'s Crown became a sought-after artifact, coveted by scholars, sages, and seekers of esoteric wisdom. Its power transcended the mortal realm, allowing those who possessed it to delve into the depths of arcane arts, divine the future, and communicate with realms beyond.\r\n\r\nHowever, the talisman\'s power was not without its price. The crown had an insatiable thirst for knowledge and an insidious influence that could corrupt the hearts of those who succumbed to its allure. It whispered tantalizing secrets, revealing forbidden truths that could drive the unprepared into madness.\r\n\r\nLegends tell of great sorcerers who wielded Baphomet\'s Crown, their minds enlightened but their souls tainted by the relentless pursuit of knowledge. Others warn of the disastrous consequences that befell those who dared to misuse its power, their hubris leading to their downfall.\r\n\r\nAs the ages passed, Baphomet\'s Crown became a relic of both reverence and caution, a symbol of the delicate balance between enlightenment and the dangers of unchecked curiosity. It found its resting place in the hidden depths of a sacred temple, guarded by ancient rites and mystic enchantments, awaiting a worthy individual who could navigate the treacherous path of enlightenment.\r\n\r\nTo this day, the legend of Baphomet\'s Crown endures, whispered among the circles of scholars and seekers of hidden knowledge. It serves as a testament to the profound mysteries of the universe and the delicate dance between mortal ambition and the divine wisdom that lies beyond mortal comprehension.', '4.99', '../../src/pictures/Baphomet\'sCrown.png', 12, 'talisman'),
(12, 'Scorchscale', 'In the scorching desert lands of Arazura, where the sun\'s relentless heat forged a harsh and unforgiving environment, a proud and resilient lizard warrior emerged. Known as Scorchscale, this formidable warrior was a living embodiment of the desert\'s endurance and cunning.\r\n\r\nBorn amidst the shifting sands, Scorchscale hailed from a tribe known as the Sunfire Clan, a group of lizardfolk who had adapted to thrive in the harsh desert conditions. From an early age, Scorchscale displayed remarkable agility, heightened senses, and an unparalleled affinity for combat.\r\n\r\nThe Sunfire Clan revered the ancient traditions of their ancestors, who had long defended their territory against marauders and rival tribes. As Scorchscale grew, they delved into the ancient teachings of their people, mastering the art of dual-blade combat, honing their reflexes, and developing a keen strategic mind.\r\n\r\nAdorned in armor crafted from the hardened scales of desert creatures, Scorchscale cut a striking figure on the arid battlefield. The lizard warrior\'s scales bore the marks of countless battles, their vibrant hues reflecting the ever-changing sands of the desert.\r\n\r\nScorchscale\'s weapon of choice was a pair of gleaming scimitars, perfectly balanced for swift and deadly strikes. With every swing, they carved through their enemies like a desert wind, leaving behind a trail of fallen foes.\r\n\r\nTheir mastery of the desert terrain was unparalleled. Scorchscale could traverse treacherous sand dunes with ease, leaving no trace behind, and could camouflage seamlessly among the rocky outcrops and sun-bleached ruins that dotted the landscape.\r\n\r\nAs a member of the Sunfire Clan, Scorchscale\'s allegiance lay with their tribe and the sacred duty of protecting their ancestral lands. The desert warrior ventured into the vast expanses of the desert, patrolling the borders, and defending their people from marauders and the ancient creatures that dwelled in the depths of the sand.\r\n\r\nThroughout their journeys, Scorchscale encountered various challenges, from battling fearsome desert beasts to navigating deadly sandstorms. But with unwavering determination and an unyielding spirit, they emerged victorious time and time again, their name echoing through the desert as a symbol of strength and indomitable will.\r\n\r\nScorchscale\'s legend grew with each passing year, their feats becoming the stuff of desert lore. They became a source of inspiration for the Sunfire Clan, their name invoked during tribal ceremonies and sung in tales passed down through generations.\r\n\r\nTo this day, Scorchscale roams the desert, a vigilant protector and a symbol of the resilience and fortitude of their people. Their presence, like the shifting sands, is a constant reminder of the desert\'s harsh beauty and the fierce warriors it births. The legend of Scorchscale lives on, a testament to the indomitable spirit of the lizard desert warrior who carved their path through the unforgiving sands of Arazura.', '7.99', '../../src/pictures/Scorchscale.png', 23, 'char'),
(14, 'Leviathan, the Abyssal Soverei', 'In the vast expanse of the ocean, where waves roared and currents whispered ancient secrets, there dwelled a colossal and awe-inspiring sea god monster known as Leviathan. Born from the primordial depths of the sea, Leviathan reigned as the undisputed ruler of the aquatic realm, commanding the fierce power of the ocean itself.\r\n\r\nLeviathan\'s immense form stretched for leagues beneath the surface, its massive body coiled with sinewy muscles and encrusted with barnacles and seaweed. The monster\'s scales shimmered with a mesmerizing array of iridescent hues, reflecting the ever-changing colors of the underwater world. From its gaping maw, rows of razor-sharp teeth glistened, capable of rending the sturdiest ships to splinters.\r\n\r\nTales of Leviathan\'s power echoed through maritime cultures, whispered by sailors and seafarers who had glimpsed the titan\'s presence. They spoke of massive tentacles that could crush ships like flimsy driftwood, and of its thunderous tail that could summon tidal waves with a single strike. Its bellowing roar, like the wrath of a tempest, sent shivers down the spines of even the hardiest seamen.\r\n\r\nThe sea god monster was both revered and feared, believed to possess dominion over the vast depths and the creatures that dwelled within. Ancient seafaring civilizations crafted elaborate rituals and offerings to appease Leviathan, praying for safe passage across its domain and protection from its wrath.\r\n\r\nLegends spoke of an unspoken accord between the sea god monster and those who dared to traverse the treacherous waters it called home. Sailors whispered that those who showed respect and reverence to Leviathan were granted favor, guided safely through storms and granted bountiful catches from the sea\'s depths.\r\n\r\nBut woe befell those who incurred the wrath of Leviathan. Ships that dared to venture into forbidden waters, driven by greed or arrogance, were met with swift and merciless destruction. Leviathan\'s wrath knew no bounds, its fury unleashed upon those who dared to challenge its authority.\r\n\r\nAs time passed, Leviathan\'s name grew synonymous with the unfathomable power and mystery of the ocean. It became the subject of countless legends, its likeness immortalized in seafaring tales and depicted in ancient maritime artwork. Its name invoked both awe and trepidation, a reminder of the boundless forces that lay beyond the reach of mortal comprehension.\r\n\r\nTo this day, Leviathan remains a formidable presence in the depths of the sea, an enigma wrapped in the ever-changing tides. Its existence serves as a constant reminder of the untamed power and unfathomable beauty of the ocean, a force to be respected and revered. The tales of Leviathan endure, shared among sailors and storytellers, reminding all who hear them of the immense and untamable forces that lie beneath the surface of the world.\r\n\r\n\r\n\r\n\r\n', '89.99', '../../src/pictures/Leviathan.png', 4, 'monster'),
(15, 'Tidalborn, the Abyssal Kraken', 'Deep within the darkest depths of the ocean, where light struggles to penetrate and the pressure is crushing, there lurks a colossal and malevolent force known as Tidalborn. This monstrous being, more commonly referred to as the Abyssal Kraken, is a legendary sea creature whose very presence instills terror in the hearts of sailors and explorers alike.\r\n\r\nTidalborn\'s form is an abomination of tentacles and sheer size. Its massive body, spanning beyond the imagination, is covered in thick, slimy scales that shimmer with an eerie bioluminescence. Its numerous writhing arms are lined with suckers capable of ensnaring entire vessels, dragging them down into the inky depths with relentless strength.\r\n\r\nLegends recount Tidalborn\'s insatiable hunger, its unquenchable thirst for destruction and chaos. Sailors tell tales of ships vanishing without a trace, their crew swallowed whole by the monstrous jaws of the Abyssal Kraken. The very sight of its immense silhouette rising from the depths is enough to shatter the resolve of the bravest seafarers.\r\n\r\nWhispers spread of Tidalborn\'s intelligence, as it is said to possess a cunning and calculated nature. It lurks beneath the surface, its eyes gleaming with a sinister intelligence, plotting and strategizing its attacks. Many believe that this colossal creature is more than a mindless beast, and instead a being of ancient wisdom and unfathomable malevolence.\r\n\r\nAncient maritime cultures speak of Tidalborn as a primordial force, a guardian of the abyssal realms and the harbinger of doom. They tell of a time when the gods themselves struggled to tame the monstrous titan, its writhing form wreaking havoc upon the mortal realm. It is said that only the combined might of the divine forces managed to imprison Tidalborn deep within the ocean\'s depths, where it would remain until the end of days.\r\n\r\nEven in its dormant state, Tidalborn\'s influence is felt across the oceans. Its mere presence can disturb the delicate balance of tides, summoning violent storms and treacherous whirlpools. Legends persist of those who seek to awaken or control the kraken\'s might, believing they could harness its destructive power for their own gain. But such endeavors are met with cautionary tales of catastrophic consequences, as Tidalborn\'s fury knows no bounds.\r\n\r\nTo this day, sailors venture into the open sea with caution, ever wary of the lurking terror that is Tidalborn. Its name is whispered among sailors as a reminder of the untamed forces that lie beneath the surface, a reminder that the ocean, for all its beauty, can birth creatures of immense power and unrelenting hunger. The legend of the Abyssal Kraken endures as a testament to the vast mysteries and dangers that lie within the uncharted depths of the world\'s oceans.', '29.99', '../../src/pictures/kraken.png', 23, 'monster'),
(16, 'Shadowfang, the Infernal Rava', 'In the darkest corners of the nether realms, where the fires of damnation burned eternally, there prowled a creature of nightmarish ferocity known as Shadowfang. This monstrous entity, commonly referred to as the Hellhound, embodied the essence of demonic fury and unyielding aggression.\r\n\r\nShadowfang\'s form was a twisted amalgamation of infernal power and bestial prowess. Its sleek, ebony fur seemed to absorb all light, while its glowing crimson eyes pierced through the darkness with an unholy intensity. Massive muscles rippled beneath its sleek hide, granting it unparalleled speed and strength.\r\n\r\nLegends spoke of the hellhound\'s relentless pursuit, tracking its prey with unwavering determination. Its razor-sharp fangs, dripping with demonic venom, could tear through even the hardiest of armors. Its claws, like obsidian blades, left deep gouges in the earth as it bounded forth with unmatched agility.\r\n\r\nThe very presence of Shadowfang heralded imminent destruction. Flames danced along its spine, leaving trails of flickering inferno in its wake. Its bellowing snarls echoed through the abyss, striking terror into the hearts of mortals and demons alike.\r\n\r\nWhispers spread of Shadowfang\'s origins, born from the darkest depths of the underworld, forged by the malevolence of demonic forces. It was said that the beast was once a loyal guardian, bound to serve an infernal lord, but corruption consumed it, transforming it into a nightmarish predator.\r\n\r\nLegends recounted tales of the hellhound\'s insatiable appetite for souls. It roamed the desolate landscapes of the nether realms, hunting down lost souls and wayward spirits with unrelenting fervor. Its fiery gaze pierced the very essence of its victims, draining them of life and condemning them to eternal torment.\r\n\r\nEven the most powerful sorcerers and warriors approached Shadowfang with caution, for its demonic essence defied mortal comprehension. Attempts to control or subjugate the hellhound were met with catastrophic failure, as its allegiance remained solely to the infernal forces that birthed it.\r\n\r\nTo this day, Shadowfang prowls the depths of the nether realms, a terrifying embodiment of hellish wrath and ceaseless hunger. Its name is whispered in hushed tones among the denizens of the underworld, a reminder of the price one pays when they delve too deeply into the forbidden arts.\r\n\r\nMortals and demons alike shudder at the mention of Shadowfang, a chilling reminder of the infernal creatures that lie in wait beyond the veil of the mortal realm. The legend of the Infernal Ravager endures as a testament to the boundless cruelty and relentless savagery that can be found in the depths of the nether realms.', '7.99', '../../src/pictures/wolf.png', 3, 'pet'),
(17, 'Grommash, the Skullsplitter', 'In the war-torn lands of conquest and brutality, where tribes clashed and violence reigned supreme, there stood a formidable Ork known as Grommash Skullsplitter. A towering figure among his kind, Grommash was a fearsome warrior and a revered leader, embodying the indomitable spirit and unyielding strength of the Ork race.\r\n\r\nGrommash\'s massive frame was adorned with crude yet formidable armor, fashioned from the bones and hides of fallen foes. His green skin, hardened by countless battles, bore the scars of countless conflicts. A pair of fiery red eyes burned with a fierce determination, reflecting the unquenchable fury that resided within his heart.\r\n\r\nLegends spoke of Grommash\'s prowess in combat, his proficiency with a range of brutal weapons. He wielded a massive, jagged-edged axe with devastating precision, cleaving through enemies with merciless efficiency. His thunderous war cry echoed across the battlefield, instilling both fear and awe in the hearts of his allies and adversaries alike.\r\n\r\nGrommash was more than a brute force, however. He possessed a strategic mind, honed through years of tactical warfare. His leadership skills rallied his warband, instilling unwavering loyalty and discipline among his troops. Under his command, the Orks fought as an unstoppable force, overwhelming their enemies with sheer aggression and unrelenting ferocity.\r\n\r\nWhispers spread of Grommash\'s origins, tales of a humble beginning in the harsh wilderness where survival was a constant struggle. He clawed his way to the top, uniting scattered tribes and forging a fearsome army that would become the bane of empires. His rise to power was marked by countless conquests, as his warband carved a path of destruction across the lands.\r\n\r\nGrommash\'s name became synonymous with the Ork way of life, a symbol of unyielding strength and unbridled chaos. His legend inspired generations of Orks, fueling their desire for conquest and the glory of battle. Warriors from far and wide sought to join his ranks, eager to bask in the aura of his leadership and partake in the spoils of war.\r\n\r\nTo this day, Grommash Skullsplitter stands as a towering figure in Ork lore, an icon of unrelenting aggression and unwavering determination. His name is revered among his kin, his legacy etched into the annals of their violent history. The tale of Grommash\'s conquests lives on, inspiring future generations of Orks to seize their destiny on the battlefield and revel in the thrill of eternal warfare.', '12.99', '../../src/pictures/Ork2.png', 5, 'char'),
(18, 'Stormstrider, the Aetherborne ', 'In the skies where clouds swirl and thunder cracks, there soars a legendary zepellin warship known as Stormstrider. This colossal airship, hailed as the Aetherborne Leviathan, embodies the pinnacle of technological marvel and aerial supremacy.\r\n\r\nStormstrider\'s majestic form spans the horizon, a behemoth of metal and canvas suspended in the heavens. Its sleek and streamlined design cuts through the air with unmatched grace, propelled by colossal propellers and powered by advanced arcane engines. Gleaming brass and iron plating fortify its hull, offering both protection and an imposing presence.\r\n\r\nLegends recount Stormstrider\'s devastating firepower, as its arsenal boasts an array of lethal weaponry. Mighty cannons line its sides, capable of unleashing barrages of explosive projectiles that can level cities and decimate enemy forces. Lightning-projecting tesla coils crackle with raw energy, capable of unleashing devastating bolts upon airborne adversaries.\r\n\r\nThe crew of Stormstrider, handpicked from the finest pilots, engineers, and warriors, operate as a well-oiled machine. They navigate the treacherous skies with precision, maneuvering the behemoth warship with expert skill. Their devotion to duty and unwavering loyalty to their captain make them a formidable force to be reckoned with.\r\n\r\nWhispers spread of Stormstrider\'s origins, of a brilliant visionary who conceived the grand design. It is said that the ship\'s creation was the result of a collaboration between genius engineers and skilled arcane artisans. Bound by a shared ambition, they poured their knowledge and craftsmanship into forging the ultimate warship of the skies.\r\n\r\nStormstrider represents more than just a vessel of war; it symbolizes the power and might of an empire or faction that commands its awe-inspiring presence. Its mere appearance in the skies strikes fear into the hearts of enemies and inspires hope in the hearts of allies. Its towering silhouette casts a shadow across the battlefield, signaling an unstoppable force ready to unleash devastation upon its foes.\r\n\r\nLegends persist of the epic battles in which Stormstrider has participated, turning the tide of wars and leaving a trail of destruction in its wake. Its name has become synonymous with air superiority, an embodiment of the triumph of technology and ingenuity over adversity.\r\n\r\nTo this day, Stormstrider continues to dominate the skies, its legacy soaring across generations. The tale of the Aetherborne Leviathan inspires awe and admiration, a testament to the limitless potential of human innovation and the mastery of the skies. It remains a symbol of power, a weapon of awe-inspiring might, and a testament to the indomitable spirit of those who dare to conquer the heavens.', '88.99', '../../src/pictures/zeppelin.png', 2, 'vehicle'),
(19, 'Captain Blackbeard, the Dread ', 'In the vast and treacherous oceans, where lawlessness and adventure intertwined, there sailed a notorious pirate known as Captain Blackbeard, the Dread Corsair. With a fearsome reputation and an insatiable thirst for treasure, Blackbeard ruled the high seas with an iron fist and a crew of cutthroat buccaneers.\r\n\r\nCaptain Blackbeard was a figure shrouded in mystery and terror. His tall and imposing figure, draped in dark, tattered clothing, was adorned with a cascade of long, jet-black hair and a braided beard intertwined with smoldering fuses. His eyes burned with an intensity that struck fear into the hearts of those who crossed his path.\r\n\r\nLegends whispered of Blackbeard\'s cunning and ruthlessness. He commanded his ship, the dreaded vessel named the Shadowfang, with a strategic brilliance that outmatched naval forces and rival pirates alike. His crew, a motley collection of hardened rogues and swashbucklers, followed him with unwavering loyalty, inspired by his indomitable spirit and fierce determination.\r\n\r\nBlackbeard\'s infamy grew with each daring raid and merciless act of piracy. Tales of his ruthless nature spread like wildfire across the seafaring world. His flag, emblazoned with a skull and crossed cutlasses, struck terror into the hearts of those unfortunate enough to glimpse it on the horizon.\r\n\r\nWhispers spread of Blackbeard\'s hidden hoard, a fabled treasure that surpassed the wildest imaginations. Many believed that his wealth surpassed that of kings and empires, amassed through cunning, intimidation, and the ruthless elimination of any who dared to oppose him. Pirates and treasure hunters alike sought to uncover the location of Blackbeard\'s legendary stash, willing to risk everything for a chance at unimaginable wealth.\r\n\r\nThe name Captain Blackbeard became synonymous with piracy itself, a symbol of the lawless and romanticized life on the high seas. His legend grew with each passing tale, inspiring countless others to don the pirate\'s hat and seek their own fortune in the world of plunder and adventure.\r\n\r\nTo this day, Captain Blackbeard\'s legacy lives on in the annals of pirate lore. His name continues to invoke both fear and fascination, a reminder of a bygone era where the Jolly Roger ruled the waves and the lure of buried treasure fueled the dreams of seafarers. The tale of the Dread Corsair serves as a testament to the enduring allure of the pirate\'s life and the spirit of rebellion against the constraints of society and authority.', '19.99', '../../src/pictures/pirate.png', 32, 'char'),
(20, 'Seraphiel, the Celestial Blade', 'In the realm of ethereal realms and divine power, there stood an angelic warrior known as Seraphiel, the Celestial Blade. Clad in resplendent armor crafted from radiant celestial materials, Seraphiel embodied the grace and might of the heavens.\r\n\r\nSeraphiel\'s presence was awe-inspiring, with wings of pure light unfurled majestically behind them. Their eyes shimmered with a luminous brilliance, reflecting the purity of their soul and the unwavering dedication to their divine purpose. Adorned with a halo of radiant energy, Seraphiel radiated an aura of tranquility and unwavering righteousness.\r\n\r\nLegends spoke of Seraphiel\'s role as a champion of justice and defender of the innocent. They wielded a celestial blade, forged by the gods themselves, which gleamed with divine power. Each swing of the blade carried the weight of righteousness, cutting through darkness and malevolence with a precision that defied mortal comprehension.\r\n\r\nSeraphiel\'s wings carried them effortlessly through the celestial planes, soaring above the mortal realm and protecting it from threats both mundane and otherworldly. They were a beacon of hope in times of despair, a guiding light that banished shadows and inspired courage in the hearts of mortals.\r\n\r\nWhispers spread of Seraphiel\'s origins, born from the purest essence of divine energy. It was said that they were chosen by the celestial deities to embody their principles of justice, mercy, and compassion. Seraphiel\'s unwavering loyalty to the divine cause made them a formidable warrior against the forces of darkness and corruption.\r\n\r\nThe name Seraphiel resonated throughout the heavens, spoken in hushed reverence by angels and mortals alike. Their unwavering commitment to righteousness and their tireless efforts to protect the innocent earned them the admiration of both heavenly beings and those who sought refuge from the perils of the mortal realm.\r\n\r\nTo this day, Seraphiel continues their divine mission, tirelessly defending the realms of light against the encroaching darkness. Their name is spoken in prayers of hope and whispered in tales of valor. The legend of the Celestial Blade serves as a testament to the power of righteousness and the eternal struggle between light and darkness. Seraphiel\'s presence reminds us that even in the bleakest of times, a glimmer of divine grace can guide us towards a brighter future.', '12.99', '../../src/pictures/angelWarrior.png', 32, 'char'),
(21, 'Grimthorn, the Eternal Revenan', 'In the depths of shadowed tombs and forgotten crypts, there emerged an undead skeletal warrior known as Grimthorn, the Eternal Revenant. Freed from the shackles of mortality, Grimthorn rose from the grave to walk the realms of the living as a relentless force of undeath.\r\n\r\nGrimthorn\'s skeletal form, draped in tattered remnants of ancient armor, emanated an eerie aura of death. Empty eye sockets glowed with an unholy light, piercing the darkness with an otherworldly glow. Bound by ancient enchantments and cursed to eternally serve in battle, Grimthorn bore the marks of countless wounds, their bones cracked and splintered, yet forever unyielding.\r\n\r\nLegends whispered of Grimthorn\'s insatiable thirst for vengeance, as they wielded a wicked blade infused with dark magic. Each swing of their ethereal weapon sent shivers down the spines of the living, draining the life force from their foes and empowering the undead warrior. Grimthorn\'s mastery of swordplay, honed through centuries of battle, made them a formidable opponent even in their skeletal form.\r\n\r\nGrimthorn\'s existence was shrouded in mystery, their true origins lost to the ravages of time. It was said that they were once a valiant knight, betrayed and slain in a treacherous act of betrayal. Bound by an ancient necromantic ritual, Grimthorn\'s spirit clung to the mortal plane, refusing to rest until justice was served and their tormentors paid the ultimate price.\r\n\r\nThe name Grimthorn echoed in the whispers of the damned and the fearful murmurs of those who dared speak of the undead warrior. Their relentless pursuit of retribution made them a feared figure among both the living and the undead. No fortress could withstand their wrath, no mortal army could quell their undying fury.\r\n\r\nTo this day, Grimthorn roams the lands, their skeletal figure a harbinger of doom and a reminder of the consequences of betrayal. Their name invokes both terror and pity, for they are trapped in a perpetual cycle of vengeance and suffering. The legend of the Eternal Revenant serves as a cautionary tale, a reminder that the sins of the past can never be truly buried, and the specter of revenge may rise from the depths of the grave to claim its due.\r\n\r\n\r\n\r\n\r\n', '20.99', '../../src/pictures/skelett.png', 23, 'char'),
(22, 'Valerion, the Aerial Sentinel', 'In the realm of noble knights and chivalry, there soared a majestic winged warrior known as Valerion, the Aerial Sentinel. With wings of pure white feathers that spanned wide, Valerion embodied grace, valor, and unwavering dedication to the ideals of honor and justice.\r\n\r\nValerion\'s presence commanded respect and admiration, as they stood tall in gleaming armor adorned with intricate engravings depicting tales of heroic deeds. Their eyes, as piercing as the clearest sky, surveyed the world below with a vigilant gaze. A radiant aura surrounded them, reflecting their unwavering commitment to righteousness.\r\n\r\nLegends spoke of Valerion\'s unmatched skill in aerial combat, their mastery of the sky matched only by their prowess on the ground. They wielded a mighty lance, tipped with a shining blade that cleaved through darkness and evil with divine precision. Mounted upon a noble steed, their partnership formed an unbreakable bond, enabling them to soar through the heavens and strike down foes with swift and righteous fury.\r\n\r\nValerion\'s name resonated among the ranks of knights and common folk alike. They were a symbol of hope, an embodiment of noble ideals in a world plagued by darkness and turmoil. Their dedication to protecting the innocent and upholding the principles of chivalry inspired countless others to take up arms and fight for justice.\r\n\r\nWhispers spread of Valerion\'s origins, of a noble lineage descended from ancient heroes. It was said that they were chosen by the heavens themselves, blessed with the gift of flight and granted the strength to defend the weak. Valerion\'s unwavering loyalty to the code of honor made them a paragon of knighthood, inspiring others to follow in their noble footsteps.\r\n\r\nTo this day, Valerion soars through the skies, their figure a symbol of hope and a beacon of light in times of darkness. Their name is spoken in tales of valor and echoed in the hearts of those who long for justice. The legend of the Aerial Sentinel serves as a reminder that bravery knows no bounds, and that even in the most dire of circumstances, a knight\'s unwavering spirit can rise above and bring forth a brighter dawn.', '20.99', '../../src/pictures/WingedKnight.png', 12, 'char'),
(23, 'Ancient Flame Sword', 'Behold the awe-inspiring power of the Flame`s Embrace, a legendary sword that blazes with an eternal inferno. Crafted by ancient smiths with unrivaled skill, this mythical weapon harnesses the very essence of fire itself. Its blade, forged from enchanted alloys, glows with an intense, fiery hue, radiating both beauty and danger.\r\n\r\nAs you wield the Flame`s Embrace, you become the master of flames, commanding the scorching elements with each swing. With every strike, tongues of fire lick and dance along its razor-sharp edge, engulfing enemies in searing agony. Its flames consume all that stands in your path, reducing obstacles to smoldering ashes.\r\n\r\nThis fabled sword is more than a mere weapon—it is a symbol of power and destiny. Those who possess the Flame`s Embrace are granted the ability to channel and manipulate fire, bestowing upon them both fearsome offensive capabilities and unmatched resilience against heat-based attacks.\r\n\r\nThroughout your perilous journey, the Flame`s Embrace becomes a loyal ally, its brilliance guiding you through the darkest of nights. Together, you will face formidable adversaries, turning the tide of battle with each swing of the blade, leaving trails of devastation in your wake.\r\n\r\nAre you prepared to wield the legendary Flame`s Embrace and become a legend yourself, leaving a path of incinerated foes in your quest for glory? Embrace the flames, warrior, and let the inferno within you ignite.', '12.99', '../../src/pictures/FlameSword.png', 2, 'item');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `redeemcodes`
--

CREATE TABLE `redeemcodes` (
  `codes` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `redeemcodes`
--

INSERT INTO `redeemcodes` (`codes`, `amount`) VALUES
('A5D5$6', 10),
('AV#43G', 20),
('welcom', 25),
('welcome12', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `SURNAME` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `erster_login` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` date DEFAULT NULL,
  `screen_resolution` varchar(20) DEFAULT NULL,
  `operating_system` varchar(50) DEFAULT NULL,
  `secret_key` varchar(20) DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `profile_pic` varchar(30) DEFAULT NULL,
  `PHONE` varchar(30) DEFAULT NULL,
  `CITY` varchar(20) DEFAULT NULL,
  `STREET` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `EMAIL`, `PASSWORD`, `FIRST_NAME`, `SURNAME`, `created_at`, `erster_login`, `last_login`, `screen_resolution`, `operating_system`, `secret_key`, `is_online`, `profile_pic`, `PHONE`, `CITY`, `STREET`) VALUES
(170, 'luis.wehrberger2@gmail.com', '6a3d5d9937f38308b1fa95e224694f81aa49b8ff9c94debeb665a7256057f8a366ab5720b35fa4b417e375431a5c2936c08003904c00e56f75265055badd5440', 'Luis', 'Wehrberger', '2023-06-30 16:19:08', 0, NULL, '1920x1080', 'Windows Betriebssystem', 'DXE7YN5WDLWIF6E5', 0, NULL, NULL, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bestellungsitems`
--
ALTER TABLE `bestellungsitems`
  ADD KEY `orderId` (`orderId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `redeemcodes`
--
ALTER TABLE `redeemcodes`
  ADD PRIMARY KEY (`codes`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`EMAIL`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellungsitems`
--
ALTER TABLE `bestellungsitems`
  ADD CONSTRAINT `bestellungsitems_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `bestellungen` (`id`),
  ADD CONSTRAINT `bestellungsitems_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`);

--
-- Constraints der Tabelle `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
