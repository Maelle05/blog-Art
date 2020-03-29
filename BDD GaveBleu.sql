-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 03:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogart20`
--

-- --------------------------------------------------------

--
-- Table structure for table `angle`
--

CREATE TABLE IF NOT EXISTS `angle` (
  `NumAngl` char(8) NOT NULL,
  `LibAngl` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumAngl`),
  KEY `ANGLE_FK` (`NumAngl`),
  KEY `FK_ASSOCIATION_6` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `angle`
--

INSERT INTO `angle` (`NumAngl`, `LibAngl`, `NumLang`) VALUES
('ANGL0101', 'Handicap', 'FRAN01'),
('ANGL0102', 'Handicap', 'ANGL01'),
('ANGL0103', 'Handikap', 'ALLE01'),
('ANGL0201', 'Grandes figures littéraires', 'FRAN01'),
('ANGL0202', 'Great literary figures', 'ANGL01'),
('ANGL0203', 'Große literarische Persönlichkeiten', 'ALLE01'),
('ANGL0301', 'Happy hours', 'FRAN01'),
('ANGL0302', 'Happy hours', 'ANGL01'),
('ANGL0303', 'Happy hours', 'ALLE01'),
('ANGL0401', 'Histoire médiévale', 'FRAN01'),
('ANGL0402', 'Medieval History', 'ANGL01'),
('ANGL0403', 'Mittelalterliche Geschichte', 'ALLE01'),
('ANGL0501', 'Intelligence collective', 'FRAN01'),
('ANGL0502', 'Collective Intelligence', 'ANGL01'),
('ANGL0503', 'Gemeinsame Intelligenz', 'ALLE01'),
('ANGL0601', 'Expérience 3.0', 'FRAN01'),
('ANGL0602', 'Experience 3.0', 'ANGL01'),
('ANGL0603', 'Erfahrung 3.0', 'ALLE01'),
('ANGL0701', 'Chatbot et IA', 'FRAN01'),
('ANGL0702', 'Chatbot and IA', 'ANGL01'),
('ANGL0703', 'Chatbot und KI', 'ALLE01'),
('ANGL0801', 'Stories', 'FRAN01'),
('ANGL0802', 'Stories', 'ANGL01'),
('ANGL0803', 'Geschichten', 'ALLE01'),
('ANGL0901', 'Secret', 'FRAN01'),
('ANGL0902', 'Secret', 'ANGL01'),
('ANGL0903', 'Geheimnis', 'ALLE01'),
('ANGL1001', 'We heart it', 'FRAN01'),
('ANGL1002', 'We heart it', 'ANGL01'),
('ANGL1003', 'Wir lieben es', 'ALLE01'),
('ANGL1101', 'Yik Yak', 'FRAN01'),
('ANGL1102', 'Yik Yak', 'ANGL01'),
('ANGL1103', 'Yik Yak', 'ALLE01'),
('ANGL1201', 'Shots', 'FRAN01'),
('ANGL1202', 'Shots', 'ANGL01'),
('ANGL1203', 'Aufnahmen', 'ALLE01'),
('ANGL1301', 'Tik Tok', 'FRAN01'),
('ANGL1302', 'Tik Tok', 'ANGL01'),
('ANGL1303', 'Tik Tok', 'ALLE01'),
('ANGL1401', 'Recherche vocale', 'FRAN01'),
('ANGL1402', 'Voice search', 'ANGL01'),
('ANGL1403', 'Sprachsuche', 'ALLE01'),
('ANGL1501', 'CHU Bordeaux', 'FRAN01'),
('ANGL1601', 'Base sous-marine', 'FRAN01'),
('ANGL1701', 'sang bleu', 'FRAN01'),
('ANGL1801', 'Restoration', 'FRAN01'),
('ANGL1901', 'Couleur de Bordeaux', 'FRAN01'),
('ANGL2001', 'Star de bordeaux', 'FRAN01'),
('ANGL2101', 'Girondins', 'FRAN01');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `NumArt` char(10) NOT NULL,
  `DtCreA` date DEFAULT NULL,
  `LibTitrA` text,
  `LibChapoA` text,
  `LibAccrochA` text,
  `Parag1A` text,
  `LibSsTitr1` text,
  `Parag2A` text,
  `LibSsTitr2` text,
  `Parag3A` text,
  `LibConclA` text,
  `UrlPhotA` char(255) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `NumAngl` char(8) NOT NULL,
  `NumThem` char(8) NOT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`),
  KEY `ARTICLE_FK` (`NumArt`),
  KEY `FK_ASSOCIATION_1` (`NumAngl`),
  KEY `FK_ASSOCIATION_2` (`NumThem`),
  KEY `FK_ASSOCIATION_3` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('09', '2019-02-24', 'Lorem Ipsum : What is Lorem Ipsum?', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Where can I get some?There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'imgArt.jpg', 33, 'ANGL0301', 'THE0102', 'FRAN01'),
('10', '2019-02-24', 'Lorem Ipsum : What is Lorem Ipsum?', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from ', 'imgArt.jpg', 5, 'ANGL0301', 'THE0102', 'FRAN01'),
('11', '2019-01-09', 'Lorem Ipsum : Qu''est-ce que le Lorem Ipsum?', 'Il n''y a personne qui n''aime la souffrance pour elle-même, qui ne la recherche et qui ne la veuille pour elle-même...', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'Pourquoi l''utiliser?', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L''avantage du Lorem Ipsum sur un texte générique comme ''Du texte. Du texte. Du texte.'' est qu''il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour ''Lorem Ipsum'' vous conduira vers de nombreux sites qui n''en sont encore qu''à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d''y rajouter de petits clins d''oeil, voire des phrases embarassantes).', 'Où puis-je m''en procurer?', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d''entre elles a été altérée par l''addition d''humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu''il n''y a rien d''embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d''humour.', 'L''extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du ', 'imgArt.jpg', 1, 'ANGL0301', 'THE0104', 'FRAN01'),
('12', '2019-01-09', 'Lorem Ipsum : Qu''est-ce que le Lorem Ipsum?', 'Le passage de Lorem Ipsum standard, utilisé depuis 1500', '« Lorem ipsum carottes, amélioré développeur de premier cycle, mais ils occaecat le temps et la vitalité, comme le travail et l''obésité. Au fil des ans viennent, qui exercent nostrud, le travail du district scolaire, à moins qu''ils aliquip d''avantage. ', 'Les devoirs si le consommateur cupidatat trouver plaisir veut être un cillum de football, il fuit la douleur, ne produit pas obtenu. excepteur cupidatat noirs ne sont pas excepteur, est apaisante pour l''âme, qui est, ils ont déserté les devoirs généraux de ceux qui sont à blâmer pour vos problèmes ', 'Section du 10/01/32 « Le Extrêmes du Bien et du Mal » de CicSron (45 av.)', '« Mais je dois vous expliquer comment tout cela fausse idée de dénoncer le plaisir et louant la douleur, le tout exposer les enseignements réels de la grande vérité et le maître-bâtisseur de bonheur humain suffisant. Aucun de plaisir lui-même, parce qu''il est la douleur ou évite, mais parce que conséquences de rencontre qui sont les douleurs de ceux qui sont à la recherche du plaisir rationnellement au courant. ni plus, toute personne appartenant à, ceux qui tranquillement ipsum quia dolor sit amet, consectetur, pour obtenir qu''elle veut, mais parce qu''ils ne jamais être attaché aux modes des temps de la chute afin que le travail et la douleur, un grand regard pour le plaisir. Télécharger l''information en tant que vCard E , quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,ou celui qui évite une douleur qui ne produit aucun plaisir résultant? ', 'Section 1.10.33 du ', '« Mais la vérité d''entre eux, et ils accusent et il est juste la haine digne de l''ignominie, qui est le flatteries des plaisirs présents accusantium d''entre eux corrompus de ces douleurs, et pour lequel il trouble excepturi ils sont aveuglés par le désir de ne pas se réfugier, et dans le même chapitre en faute qui remplissent un bureau, ils ont déserté la faiblesse générale de l''esprit, qui est, de son travail et douloureux. Et ceux-ci, en effet, des choses simples et faciles aucune différence entre le. pour votre temps libre, et ils nous indépendants à le choix de l''option et lorsqu''ils ne sont pas perturbés par c''était pas, ce qui avant tout faire ce que nous aimons, tout le plaisir est d''être accueilli et toutes les douleurs évitées. Mais dans certaines circonstances, et ou de bons offices ou évite le plaisir des choses, il va souvent se produire ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'Traduction de H. Rackham (1914)', 'imgArt.jpg', 10, 'ANGL0301', 'THE0104', 'FRAN01'),
('13', '2019-01-09', 'Lorem ipsum 1 : Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet.', 'Scelerisque eu ultrices vitae auctor eu augue ut. Malesuada pellentesque elit eget gravida. ', 'Lorem ipsum 1 : Sed enim ut sem viverra. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Lorem donec massa sapien faucibus et molestie. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed velit dignissim sodales ut. Urna molestie at elementum eu facilisis sed odio morbi. Aliquam purus sit amet luctus. Sem nulla pharetra diam sit amet nisl. Netus et malesuada fames ac. Vel quam elementum pulvinar etiam. Leo a diam sollicitudin tempor id eu nisl. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Ornare arcu dui vivamus arcu felis bibendum ut. Lorem ipsum dolor sit amet. Consectetur adipiscing elit ut aliquam purus sit amet luctus venenatis. Etiam tempor orci eu lobortis elementum. Nibh sit amet commodo nulla facilisi. Ante in nibh mauris cursus mattis molestie a.', 'Lorem ipsum : Odio morbi quis commodo odio aenean sed adipiscing diam donec. ', 'Lectus mauris ultrices eros in cursus turpis massa tincidunt. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Habitant morbi tristique senectus et. Nisi vitae suscipit tellus mauris a diam. Duis convallis convallis tellus id interdum velit laoreet. Sollicitudin nibh sit amet commodo. Cras pulvinar mattis nunc sed blandit. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Id porta nibh venenatis cras sed felis eget velit aliquet.', 'Lorem ipsum 2 : Tempus quam pellentesque nec nam. Tortor consequat id porta nibh. Sociis natoque penatibus et magnis dis. ', 'Dolor sed viverra ipsum nunc. Tincidunt augue interdum velit euismod. Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Nulla porttitor massa id neque aliquam vestibulum. Risus in hendrerit gravida rutrum quisque. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Consectetur purus ut faucibus pulvinar elementum integer enim neque. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Nisl nisi scelerisque eu ultrices vitae auctor eu. Sit amet mauris commodo quis. A diam sollicitudin tempor id eu nisl nunc mi ipsum. Nullam eget felis eget nunc lobortis. Facilisis gravida neque convallis a cras. Ullamcorper a lacus vestibulum sed arcu. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. Tincidunt vitae semper quis lectus nulla at volutpat.', 'Sed turpis tincidunt id aliquet. Non diam phasellus vestibulum lorem sed. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Quis risus sed vulputate odio. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Nulla facilisi morbi tempus iaculis. Ac ut consequat semper viverra nam. Nisl nunc mi ipsum faucibus. Justo nec ultrices dui sapien eget mi proin sed libero. Donec massa sapien faucibus et molestie. Leo integer malesuada nunc vel risus. Consectetur adipiscing elit duis tristique. At elementum eu facilisis sed odio morbi quis commodo odio.', 'imgArt.jpg', 8, 'ANGL0301', 'THE0104', 'FRAN01'),
('14', '2019-01-09', 'Lorem Ipsum: utilisation', 'Lorem ipsum : Il n''y a personne qui n''aime la souffrance pour elle-même, qui ne la recherche et qui ne la veuille pour elle-même...', 'Il n''est pas plus loin, parce que ce sont les carottes de la douleur, Minneapolis, veut obtenir ... »', 'Lorem ipsum est un texte pseudo-latin utilisé dans la conception Web, la typographie, la mise en page et l''impression à la place de l''anglais pour mettre l''accent sur les éléments de conception plutôt que sur le contenu. Il est également appelé texte d''espace réservé (ou de remplissage). C''est un outil pratique pour les maquettes. Il aide à définir les éléments visuels d''un document ou d''une présentation, par exemple la typographie, la police ou la mise en page. ', 'Sous-titre 1', 'Lorem ipsum fait principalement partie d''un texte latin de l''auteur et philosophe classique Cicéron. Ses mots et lettres ont été modifiés par ajout ou suppression, afin de rendre délibérément son contenu insensé; ce n''est plus du latin authentique, correct ou compréhensible. Alors que lorem ipsumCela ressemble toujours au latin classique, il n''a en fait aucune signification. Comme le texte de Cicéron ne contient pas les lettres K, W ou Z, étrangères au latin, celles-ci et d''autres sont souvent insérées au hasard pour imiter l''apparence typographique des langues européennes, de même que les digraphes qui ne figurent pas dans l''original.', 'Sous-titre 2', 'Dans un contexte professionnel, il arrive souvent que des clients privés ou d''entreprise rédigent une publication à faire et à présenter avec le contenu réel qui n''est toujours pas prêt. Pensez à un blog d''actualités rempli de contenu toutes les heures le jour de sa mise en ligne. Cependant, les examinateurs ont tendance à être distraits par un contenu compréhensible, par exemple, un texte aléatoire copié à partir d''un journal ou d''Internet. ', 'Ils sont susceptibles de se concentrer sur le texte, sans tenir compte de la mise en page et de ses éléments. En outre, le texte aléatoire risque d''être involontairement humoristique ou offensant, un risque inacceptable dans les environnements d''entreprise. Le Lorem ipsum et ses nombreuses variantes sont utilisés depuis le début des années 60 et très probablement depuis le XVIe siècle.', 'imgArt.jpg', 20, 'ANGL0301', 'THE0101', 'FRAN01'),
('15', '2019-03-04', 'Lorem Ipsum: common examples', 'Most of its text is made up from sections 1.10.32–3 of Cicero''s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). ', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version (', 'It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.Cicero famously orated against his political opponent Lucius Sergius Catilina. Occasionally the first Oration against Catiline is taken for type specimens: Quo usque tandem abutere, Catilina, patientia nostra? Quam diu etiam furor iste tuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?)', 'Cicero''s version of Liber Primus (first Book), sections 1.10.32–3 (fragments included in most Lorem Ipsum variants in red):', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?', 'Lorem Ipsum: translationThe Latin scholar H. Rackham translated the above in 1914:', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 'imgArt.jpg', 3, 'ANGL0602', 'THE0203', 'ANGL01'),
('16', '2019-02-20', 'Lorem Ipsum: variants and technical information', 'In 1985 Aldus Corporation launched its first desktop publishing program Aldus PageMaker for Apple Macintosh computers, released in 1987 for PCs running Windows 1.0.', 'Both contained the variant lorem ipsum most common today. Laura Perry, then art director with Aldus, modified prior versions of Lorem Ipsum text from typographical specimens; in the 1960s and 1970s it appeared often in lettering catalogs by Letraset. ', 'Anecdotal evidence has it that Letraset used Lorem ipsum already from 1970 onwards, eg. for grids (page layouts) for ad agencies. Many early desktop publishing programs, eg. Adobe PageMaker, used it to create template.', 'Lorem Ipsum: when, and when not to use it', 'Do you like Cheese Whiz? Spray tan? Fake eyelashes? That''s what is Lorem Ipsum to many—it rubs them the wrong way, all the way. It''s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we''d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.The toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes—will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I''d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.', 'Lorem Ipsum: when, and when not to use it', 'You begin with a text, you sculpt information, you chisel away what''s not needed, you come to the point, make things clear, add value, you''re a content person, you like words. Design is no afterthought, far from it, but it comes in a deserved second. Anyway, you still use Lorem Ipsum and rightly so, as it will always have a place in the web workers toolbox, as things happen, not always the way you like it, not always in the preferred order. Even if your less into design and more into content strategy you may find some redeeming value with, wait for it, dummy copy, no less.Consider this: You made all the required mock ups for commissioned layout, got all the approvals, built a tested code base or had them built, you decided on a content management system, got a license for it or adapted open source software for your client''s needs. Then the question arises: where''s the content? Not there yet? That''s not so bad, there''s dummy copy to the rescue. But worse, what if the fish doesn''t fit in the can, the foot''s to big for the boot? Or to small? To short sentences, to many headings, images too large for the proposed design, or too small, or they fit in but it looks iffy for reasons the folks in the meeting can''t quite tell right now, but they''re unhappy, somehow. A client that''s unhappy for a reason is a problem, a client that''s unhappy though he or her can''t quite put a finger on it is worse.', 'But. A big but: Lorem Ipsum is not t the root of the problem, it just shows what''s going wrong. Chances are there wasn''t collaboration, communication, and checkpoints, there wasn''t a process agreed upon or specified with the granularity required. It''s content strategy gone awry right from the start. Forswearing the use of Lorem Ipsum wouldn''t have helped, won''t help now. It''s like saying you''re a bad designer, use less bold text, don''t use italics in every other paragraph. True enough, but that''s not all that it takes to get things back on track.', 'imgArt.jpg', 4, 'ANGL0703', 'THE0302', 'ALLE01'),
('17', '2020-03-05', 'So Lorem Ipsum is bad (not necessarily)', 'There''s lot of hate out there for a text that amounts to little more than garbled words in an old language. ', 'The villagers are out there with a vengeance to get that Frankenstein, wielding torches and pitchforks, wanting to tar and feather it at the least, running it out of town in shame.', 'One of the villagers, Kristina Halvorson from Adaptive Path, holds steadfastly to the notion that design can’t be tested without real content:I’ve heard the argument that “lorem ipsum” is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we’re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.', 'If that''s what you think how bout the other way around? How can you evaluate content without design? ', 'No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight, emphasis, oblique stresses, priorities, all those subtle cues that also have visual and emotional appeal to the reader. Rigid proponents of content strategy may shun the use of dummy copy but then designers might want to ask them to provide style sheets with the copy decks they supply that are in tune with the design direction they require.Or else, an alternative route: set checkpoints, networks, processes, junctions between content and layout. Depending on the state of affairs it may be fine to concentrate either on design or content, reversing gears when needed.Or maybe not. How about this: build in appropriate intersections and checkpoints between design and content. Accept that it’s sometimes okay to focus just on the content or just on the design.', 'Luke Wroblewski, currently a Product Director at Google, holds that fake data can break down in real life.', 'Using dummy content or fake information in the Web design process can result in products with unrealistic assumptions and potentially serious design flaws. A seemingly elegant design can quickly begin to bloat with unexpected content or break under the weight of actual activity. Fake data can ensure a nice looking layout but it doesn’t reflect what a living, breathing application must endure. Real data does.Websites in professional use templating systems. Commercial publishing platforms and content management systems ensure that you can show different text, different data using the same template. When it''s about controlling hundreds of articles, product pages for web shops, or user profiles in social networks, all of them potentially with different sizes, formats, rules for differing elements things can break, designs agreed upon can have unintended consequences and look much different than expected.This is quite a problem to solve, but just doing without greeking text won''t fix it. Using test items of real content and data in designs will help, but there''s no guarantee that every oddity will be found and corrected. Do you want to be sure? Then a prototype or beta site with real content published from the real CMS is needed—but you’re not going that far until you go through an initial design cycle.', 'Lorem Ipsum actually is usefull in the design stage as it focuses our attention on places where the content is a dynamic block coming from the CMS (unlike static content elements that will always stay the same.) Blocks of Lorem Ipsum with a character count range provide a obvious reminder to check and re-check that the design and the content model match up.Kyle Fiedler from the Design Informer feels that distracting copy is your fault:If the copy becomes distracting in the design then you are doing something wrong or they are discussing copy changes. It might be a bit annoying but you could tell them that that discussion would be best suited for another time. At worst the discussion is at least working towards the final goal of your site where questions about lorem ipsum don’t.', 'imgArt.jpg', 50, 'ANGL0703', 'THE0303', 'BULG01'),
('18', '2020-03-28', 'Le CHU de bordeaux se met-il au bleu ?', 'Le bleu, une couleur si commune, qui provoque tranquillit&eacute;, s&eacute;curit&eacute; et confiance. Toutes ces raisons pourraient d&eacute;j&agrave; expliquer ce que Gav&eacute; bleu a remarqu&eacute; ... Mais regardons plus loin ! Pourquoi le CHU, lieu d&rsquo;urgence, d&rsquo;anxi&eacute;t&eacute;, parfoi lier aux d&eacute;funts, se pare d&rsquo;une couleur si compl&eacute;mentaire, le bleu ?', 'Le CHU de Bordeaux, est un lieu au service de tous, il tient un r&ocirc;le important dans la vie des Bordelais, et pourtant nous ne le connaissons pas !', 'Tout d&rsquo;abord, un logo, que vous avez vu et revu, mais auquel vous n''avez jamais, vraiment pr&ecirc;t&eacute; attention. Ce logo est le m&ecirc;me depuis 20 ans, exprimant les valeurs de l&rsquo;h&ocirc;pital, l&rsquo;accueil, l&rsquo;ouverture et l&rsquo;&eacute;change. Il v&eacute;hicule une image forte et symbolique. \r\nDe plus, sa couleur est bleue ciel, tel les casques bleus de l&rsquo;ONU, &eacute;voque donc la paix, l&rsquo;assurance, la bienveillance et l&rsquo;expertise. On peut remarquer que, c&rsquo;est aussi la couleur phare de grands groupes, et d&rsquo;entreprises pharmaceutiques, tel que La Roche-Posay, Bayer, Vichy ou encore Nivea.\r\nPourquoi un tel int&eacute;r&ecirc;t ? Vous ne le savez peut-&ecirc;tre pas, mais &agrave; une &eacute;poque, on parlait de &ldquo;Sang Bleu&rdquo;, ce qui correspondait aux personnes de la noblesse ou de sang royal, donc historiquement le bleu &eacute;voque aussi, le prestige ! \r\nPour finir le bleu est aussi une des 3 couleurs primaire, donc essentiel pour pouvoir construire les autres couleurs, ce qui fait &eacute;cho avec le fait que l''h&ocirc;pital est en lieu n&eacute;cessaire et primordial &agrave; la soci&eacute;t&eacute; !', 'Savez-vous pourquoi les blouses des chirurgiens sont-elles bleues ?', 'Voici une question que vous ne vous &ecirc;tes peut-&ecirc;tre jamais pos&eacute;e. Pourquoi les diff&eacute;rents h&ocirc;pitaux, ont-ils choisi, pour leurs op&eacute;rations la couleur bleue, ou m&ecirc;me vert clair ?\r\nLa couleur actuelle des blouses des chirurgiens, n''a pas &eacute;t&eacute; choisie au hasard. Avant, les blouses &eacute;taient blanches, symbole de propret&eacute;. Mais le blanc s&rsquo;est r&eacute;v&eacute;l&eacute; &ecirc;tre source d&rsquo;illusion d&rsquo;optique. Comme nous le savons, les chirurgiens passent souvent de tr&egrave;s longues heures concentr&eacute;s sur des organes ou du sang humain&hellip; Le cerveau est donc concentr&eacute; sur ces tons rouges, si le chirurgien fixe soudainement sa blouse, ou la blouse de ses coll&egrave;gues, il verra des t&acirc;ches noires, ce ph&eacute;nom&egrave;ne peut le d&eacute;concentrer pendant quelques minutes. Ce qui n&rsquo;arrive pas si les blouses et les murs sont verts ou bleus, car ces couleurs sont des couleurs compl&eacute;mentaires aux teintes rouges !  \r\nCe sont donc, les couleurs qui g&ecirc;nent le moins les professionnels de sant&eacute;. De plus, elles permettent de rendre les yeux plus sensibles aux diff&eacute;rentes couleurs de l''anatomie humaine et les aident &agrave; &ecirc;tre plus attentifs aux &eacute;ventuelles erreurs durant l''op&eacute;ration.\r\nBluffant non ?', 'Connaissez vous les f&eacute;es du CHU de Bordeaux ?', 'Les F&eacute;es Bleues sont une association cr&eacute;&eacute;e par le personnel soignant du CHU, qui a pour but d&rsquo;apporter de la couleur et du confort, dans le monde aseptis&eacute; du soin des pr&eacute;matur&eacute;s ou bien pour les enfants en r&eacute;animation. Ces b&eacute;n&eacute;voles sont des aides-soignantes ou infirmi&egrave;res qui y consacrent leurs temps libre.\r\nCes f&eacute;es bleues, cr&eacute;ent ainsi, des parures color&eacute;es pour les incubateurs, confectionnent des jeux pour occuper les enfants, ou cr&eacute;e des tuniques color&eacute;es pour remplacer les tuniques de soins ... \r\nLe CHU soutient l''initiative de son personnel soignant, et a m&ecirc;me accueilli r&eacute;cemment un nouveau pensionnaire au service p&eacute;diatrique. \r\nIl s&rsquo;appelle Nao, il est bleu et blanc, et il mesure 58 cm ! Sa mission est d&rsquo;aider les enfants qui ne peuvent pas sortir de l''h&ocirc;pital &agrave; cause de leur d&eacute;ficience immunitaire. Ce robot joue, danse et parle &hellip; Il a &eacute;t&eacute; programm&eacute; &agrave; destination des personnes autistes, handicap&eacute;es, ou &acirc;g&eacute;es. Gr&acirc;ce &agrave; son intelligence artificielle, le robot rompt l''isolement, et recr&eacute;e du lien avec l''ext&eacute;rieur.\r\nCe beau cadeau fait aux enfants du CHU de Bordeaux, a &eacute;t&eacute; offert par le Lion Club Bordeaux Graves, un cadeaux d&rsquo;une valeur de 12 000 &euro; !', 'Et voil&agrave; vous savez maintenant tout sur le CHU de Bordeaux ! Quoi que &hellip; Savez-vous qu&rsquo;il participe &agrave; l''op&eacute;ration de sensibilisation Mars Bleu ? Notre h&ocirc;pital se met donc au bleu pour am&eacute;liorer son quotidien et pour le plus grand plaisir de Gav&eacute; Bleu !', 'imgArt18.jpg', 0, 'ANGL1501', 'THE0104', 'FRAN01'),
('19', '2020-03-28', 'La surprenante reconversion de la base sous-marine', 'Un b&acirc;timent unique charg&eacute; d''histoire qui a surv&eacute;cu &agrave; l''emprise des Allemands en 1943, et qui est aujourd''hui l''un des symboles d''art de notre ville bordelaise. Comment ce bloc de b&eacute;ton arm&eacute; a-t-il pu surpasser son obscure origine ?', 'La grande immerg&eacute;e du port de la Lune, &eacute;clair&eacute;e de son immense n&eacute;on bleu &ldquo;something strange happened here&rdquo; n&rsquo;as pas toujours &eacute;t&eacute; celle que l&rsquo;on conna&icirc;t aujourd&rsquo;hui.', 'Oui, notre base sous-marine est notre h&eacute;ritage nazi. En 1943, le bloc de b&eacute;ton, que nous connaissons tous, voit le jour apr&egrave;s 22 mois de travaux forc&eacute;s par des prisonniers. Une l&eacute;gende urbaine raconte que plus d&rsquo;une centaine de ces travailleurs se seraient noy&eacute;s d''&eacute;puisement et m&ecirc;me que certain auraient &eacute;t&eacute; coul&eacute;s dans le b&eacute;ton. 235 m&egrave;tres de long, 160 m&egrave;tres de large, 19 m&egrave;tres de hauteur, et une superficie de plus de 41 000 m2, cette base aux quatre s&oelig;urs se situant le long des c&ocirc;tes forment &agrave; la perfection le &ldquo;Mur de l&rsquo;Atlantique&rdquo; &eacute;rig&eacute; par les nazis fous. Le b&acirc;timent de guerre a &eacute;t&eacute; pens&eacute; pour vivre des si&egrave;cles, compos&eacute; de 11 bassins, il peut accueillir quinze grands sous-marins. Tout ceci surplomb&eacute; d''une tour bunker abritant des magasins et des ateliers. L''ensemble est couvert d''un toit en b&eacute;ton arm&eacute; de plus de 5 m&egrave;tres d''&eacute;paisseur, renforc&eacute; en 1943 par un dispositif de pare-bombes, capable de provoquer l''explosion d''une bombe avant d''atteindre le toit. Un bijou nazi de 600 000 m3 de b&eacute;ton pr&ecirc;t pour r&eacute;sister.', 'Quel avenir pour cet amas de b&eacute;ton ?', 'Apr&egrave;s la destruction et le sabotage du mat&eacute;riel nazis par les Alli&eacute;s en ao&ucirc;t 1944. Il a fallu se demander que deviendrait ce b&acirc;timent. Raser l&rsquo;&eacute;difice b&eacute;tonn&eacute; est la premi&egrave;re id&eacute;e &agrave; avoir vu le jour mais elle fut rapidement abandonn&eacute;e, d&ucirc; &agrave; son coup et sa logistique trop complexe. Mais petit &agrave; petit elle va rena&icirc;tre dans les esprits apr&egrave;s avoir servie de d&eacute;cor pour le film &ldquo;Le Coup de Gr&acirc;ce&rdquo; en 1964. Plus tard sous l&rsquo;impulsion du batteur Jean-Fran&ccedil;ois Buisson un studio d&rsquo;enregistrement est am&eacute;nag&eacute; pour son groupe dans l''alv&eacute;ole 9. Le bunker commence &agrave; attirer et interpeller les artistes qui y voient un lieu charismatique. En septembre 1998, l''association Art AttAcks r&eacute;alise la premi&egrave;re exposition d&rsquo;art contemporain &ldquo;Sous le b&eacute;ton la plage&rdquo; m&ecirc;lant arts visuels et architecture. Tout ceci annonce subtilement la vocation artistique du lieu. Quelques mois plus tard la premi&egrave;re grande r&eacute;novation du vieux b&acirc;timent &agrave; lieu pour permettre le renouveau de la base sous-marine. Lors de l&rsquo;&eacute;t&eacute; 1999  la montagne de m&eacute;tal s&rsquo;ouvre enfin au public leur proposant des expositions permanentes ou temporaires. Depuis la base a accueilli de nombreuses exhibitions artistiques et plus de 110 000 visiteurs.', 'Peau neuve, color&eacute;e et num&eacute;rique pour la base bordelaise.', 'Aujourd''hui la base sous marine occupe une place incontournable dans le paysage culturel bordelais. Mais en 2020 elle se refait une beaut&eacute; ! Pass&eacute;e de l''ombre &agrave; la lumi&egrave;re voil&agrave; le nouvel objectif du monument. Culturespaces cherche &agrave; attirer tous les regards bordelais vers le b&acirc;timent b&eacute;tonn&eacute;. Son projet ? Faire de la base sous marine bordelaise le plus grand centre d''art num&eacute;rique au monde. Plusieurs d&eacute;fis ont d&ucirc; &ecirc;tre relev&eacute;s en raison de l''historique de la Base, ancien b&acirc;timent bombard&eacute; et de la pr&eacute;sence de l''eau avec une profondeur de 16 m (cr&eacute;ation de nouvelles passerelles, ajout d''un b&acirc;timent annexe future billetterie) mais tout est fait pour transformer cet amas de b&eacute;ton en&ldquo;Bassin des Lumi&egrave;res&rdquo;. Apr&egrave;s une nouvelle r&eacute;novation la grande immerg&eacute;e devient innovante et atypique gr&acirc;ce &agrave; une nouvelle exp&eacute;rience visuelle et sonore avec la projection de la premi&egrave;re exposition depuis la r&eacute;novation en l''honneur des tableaux de Gustave Klimt qui &eacute;pouseront les formes de l''&eacute;difice et se refl&eacute;teront sur les courbes de l''eau. Pr&egrave;s de 70 ans plus tard, la base sous-marine s''est m&eacute;tamorphos&eacute;e en symbole d''art comme si elle voulait prendre une revanche sur l''origine de sa construction.', 'Pour le mot de la fin : Bruno Monnier, pr&eacute;sident de Culturespace, affirme que ses &eacute;quipes et lui ont travaill&eacute; d&rsquo;arrache pied pour imaginer et concevoir la nouvelle base sous marine. Il confie &agrave; AquitaineOnline que &ldquo;C&rsquo;est une installation unique au monde qui s&rsquo;int&egrave;gre aux dimensions gigantesques du lieu&rdquo;. Chez Gav&eacute; Bleu, nous trouvons le projet fantastique ! Et nous esp&eacute;rons que comme nous vous serez au rendez-vous pour (re)d&eacute;couvrir ce monument bordelais qui revit!', 'imgArt19.jpg', 1, 'ANGL1601', 'THE0101', 'FRAN01'),
('20', '2020-03-28', 'Comment le sang bleu a domin&eacute; le symbole de Bordeaux ?', 'Tout au long de son histoire Bordeaux a connu de nombreuses fa&ccedil;on d&rsquo;&ecirc;tre repr&eacute;sent&eacute;e, ou comment ses armoiries ont &eacute;t&eacute; les images de son occupation anglaise, de sa domination royale et de la prosp&eacute;rit&eacute; moderne qu&rsquo;elle conna&icirc;t au 21&egrave;me si&egrave;cle.', 'Avez-vous d&eacute;j&agrave; vu l&rsquo;embl&eacute;matique blason de Bordeaux ?', 'Ce symbole qui &agrave; plusieurs reprises, s&rsquo;est vu transformer par la noblesse anglaise. Celui provenant du Moyen  ge tardif sous la conqu&ecirc;te fran&ccedil;aise est le plus connu puisque c&rsquo;est une repr&eacute;sentation symbolique et figur&eacute;e gr&acirc;ce auquelle on peut deviner l&rsquo;histoire entrem&ecirc;l&eacute;e de la ville. Trois couleurs dominent cet &eacute;cusson: le jaune, le rouge et le bleu. Dessus on peut y reconna&icirc;tre diff&eacute;rentes formes dont des &ldquo;meubles&rdquo; qui repr&eacute;sentent des &eacute;l&eacute;ments pr&eacute;cis. Situ&eacute; au sommet de l&rsquo;&eacute;cu bordelais, semblable &agrave; un ciel bleu nuit, &eacute;toil&eacute; de fleurs de lys, se trouve le Chef d&rsquo;azur sem&eacute; de France symbole des rois de France. Au-dessous, sur un fond rouge sang, un L&eacute;opard d&rsquo;or et non un Lion, repr&eacute;sentant la province de la Guyenne, survole une forteresse. Ce n&rsquo;est pas une simple forteresse id&eacute;ale mais l''un des monuments phare de bordeaux: la Grosse-Cloche, reproduite sous des traits stylis&eacute;s. Elle est fortifi&eacute;e de deux tours aujourd&rsquo;hui disparus. Comme d&eacute;bordant &agrave; flot, la mer d&rsquo;azur ondoy&eacute; de sable d&rsquo;argent incarnant la Garonne se voit surmont&eacute; d&rsquo;un croissant d&rsquo;argent qui fait &eacute;videmment allusion &agrave; la forme semi-circulaire du port de la Lune.', 'Un blason malmen&eacute; aux bleus visiblent.', 'Si la premi&egrave;re repr&eacute;sentation connue du blason fran&ccedil;ais de Bordeaux se trouve dans l&rsquo;ouvrage de Gabriel de Tareda nomm&eacute; Tract&eacute; contre la peste de 1519. Ce ne fut pas la premi&egrave;re version &agrave; voir le jour. La ville fut influenc&eacute;e par le sang bleu anglais, la monarchie provenant d&rsquo;Angleterre, pendant 300 ans, cette situation impactant le reflet de Bordeaux: son Blason. Richard Coeur de Lion a fa&ccedil;onn&eacute; un &eacute;cu &agrave; son image afin d''asseoir sa domination, ainsi se fut trois L&eacute;opards d&rsquo;or qui logeaient au sommet du blason. Ce n&rsquo;est qu&rsquo;en 1453 gr&acirc;ce &agrave; la reconqu&ecirc;te fran&ccedil;aise, que le blason pris sa forme d&eacute;finitive, celle qu&rsquo;on conna&icirc;t, arborant finalement le symbole des rois fran&ccedil;ais &agrave; la place. Plus tard une derni&egrave;re version apparu: deux antilopes encha&icirc;n&eacute;es et &agrave; collier fleurdelis&eacute;, ainsi qu&rsquo;une couronne murale repr&eacute;sentant une muraille encadre le blason fran&ccedil;ais. Ce sont des supports d&rsquo;armoiries inusit&eacute;es en France, au Moyen  ge. Une devise y est aussi inscrite &quot;Lilia sola regunt lunam unda castra leonem&quot; retranscrit &quot;les lys r&egrave;gnent seuls sur la lune, les ondes, la forteresse et le lion&quot; faisant allusion &agrave; la domination du roi de France sur Bordeaux, apr&egrave;s la p&eacute;riode d&rsquo;occupation anglaise.', 'Le bleu roi toujours au devant du tableau bordelais.', 'Malgr&eacute; la confuse histoire ce blason des plus symboliques, la grande ville qu&rsquo;est Bordeaux ne peut se d&eacute;cider &agrave; l&rsquo;utiliser pour se repr&eacute;senter en ces temps modernes. Pour r&eacute;soudre cette affaire de grande envergure la mairie a choisi un logo neutre tout en gardant un symbole repr&eacute;sentatif: le port de la lune. En effet le logo-type de la ville est constitu&eacute; de trois croissants entrelac&eacute;s qu&rsquo;on appelle aussi le chiffre de Bordeaux, de couleur blanc nacr&eacute; sur fond rouge bordeaux. Il n&rsquo;est pas impossible qu&rsquo;elles figurent sur certaines reliure de livre et sur la fontaine Saint-Projet de la rue St Catherine. Grav&eacute; dans la pierre, fondue dans le m&eacute;tal ou sur le verre des bouteilles &ldquo;bordelaise&rdquo; on retrouve ce symbole sur tous les produits provenant de la ville.  Le trio lunaire est &eacute;galement surmont&eacute; du nom de la ville sur fond bleu roi. Cette couleur qui a su se faire une place dans l&rsquo;histoire de Bordeaux, repr&eacute;sente autant la royaut&eacute; que le fleuve bordelais. Et aujourd&rsquo;hui &agrave; l&rsquo;&eacute;poque o&ugrave; l&rsquo;homme s&rsquo;&eacute;l&egrave;ve gr&acirc;ce aux nouvelles technologies qui nous permettent de nombreux exploits, on peut enfin poser un nom sur ce bleu qui nous a guid&eacute; tous ces si&egrave;cles et lui rendre hommage: Le Bleu 072 C.', 'Si la ville de Bordeaux a sa charte graphique et son propre logo elle n&rsquo;est pas la seule, on retrouve nombreux logo tout aussi caract&eacute;ristique s&rsquo;inspirant de l&rsquo;histoire, comme les logos d&rsquo;Aquitaine, de l&rsquo;Union Bordeaux-B&egrave;gle ou des bleus de Bordeaux: les Girondins !', 'imgArt20.jpg', 0, 'ANGL1701', 'THE0102', 'FRAN01');
INSERT INTO `article` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('21', '2020-03-28', 'Conflit de restaurant : le cordon bleu contre le citoyen !', 'La guerre fait rage dans le quartier des Chartrons ! Depuis le début des travaux de son nouveau restaurant, rien ne semble sourire à notre chef Bordelais : travaux supplémentaires et voisin hystérique tout lui tombe dessus.', 'Il en rêve depuis longtemps. Il l''avait annoncé. Il le fait.', 'Philippe Etchebest débarque chez nous à Bordeaux et lance son nouveau concept : un immeuble dédié à la gastronomie ! À l''étage, de la cuisine haut de gamme : du gastronomique pour 25 personnes dans le but d''obtenir des étoiles. Au rez de chaussé, ouvrira un restaurant plus accessible : de la pure tradition française avec des pot-au-feu, des blanquettes cuisinés avec des produits locaux. L''après-midi, il y aura un salon de thé avec de délicieuses pâtisseries, mais aussi une épicerie de produits 100% girondins pour soutenir les producteurs. Un joli projet pour nourrir tous les Bordelais, n''est-ce pas ? Le chef de la brigade bleue (j''espère que vous suivez Top Chef) a même approché Camille Delcroix, ancien vainqueur de l''émission, pour devenir son bras droit dans ce projet. Entre les deux hommes, une vraie alchimie s''est créée à l''écran mais aussi dans la vie. Etchebest veut embarquer Camille avec lui pour le faire évoluer et le préparer pour le concours de meilleur ouvrier de France. Les deux cordons bleus vont s''associer pour nous concevoir la meilleure des cartes. Tout ceci nous donne l''eau à la bouche chez Gavé Bleu !', 'Une peur bleue pour le Meilleur ouvrier de France.', 'Mais où est donc cet immeuble d''après vous ? Dans la rue Rhode, en plein milieu de la place du marché des Chartrons. Oui, Philippe ne se refuse rien! Entré par hasard dans cette ancienne menuiserie, la bâtisse tape dans l’oeil du chef étoilé, et c’est le coup de foudre ! En plein coeur de notre quartier emblématique bordelais, le rêve prend enfin vie. Les travaux sont lancés mais voilà que des ombres se dessinent au tableau. “Il y a plus de travaux que je ne pensais” déclare-t-il à nos confrères de 20 min, c’est un coup dur pour lui. L’immeuble est en état de vétusté. Le cordon bleu se voit donc dans l’obligation d’en détruire une bonne partie pour repartir sur des bases plus saines : fondations, toiture, il faut re-consolider l’immeuble. Et comme un malheur n’arrive jamais seul (n’est ce pas Philippe?) voilà que c’est maintenant au tour d’un voisin bordelais de s''ajouter à l’équation. Il habite dans un appartement au deuxième étage d’un immeuble juste derrière le futur restaurant. Et voilà le problème : un mur commun  va lui porter préjudice. Le voisin enragé porte donc recours à la mairie de Bordeaux, mais celui-ci est rejeté, alors il décide de saisir le tribunal administratif.', 'Fini le rêve bleu, le réveil brutal du chef.', 'Le tribunal a tranché et la sentence est tombée. Le permis de construire pour le deuxième restaurant du chef Philippe Etchebest est annulé. Oui, le voisin a gagné ! Celui-ci a examiné le chantier et a dressé une liste d’anormalités dont le toit en pente (remplacé par une toiture plane) et la quasi-totale destruction de l’intérieur. Rien de tout cela n’est inscrit dans le permis de construire : il crie au scandale ! De plus, le bâtiment est situé dans la “Ville de pierre” dont le PLU (Plan Local d’Urbanisme)est très stricte et protégé : les travaux de rénovation ne correspondent pas. Le rêve du chef est cette fois fortement compromis. Mais le féroce de “Cauchemar en Cuisine” ne compte pas s''arrêter là. Il va faire appel et clame sur tous les toits que son voisin n’a qu’un seul but : obtenir de l’argent ! Oui, ce bordelais ne semble pas motivé par l’amour de l’architecture mais plutôt par les 130 000 € de dédommagement qu’il demande. Philippe soutient qu’il a démoli pour reconstruire à l’identique, que ces travaux ont été jugés nécessaire par des experts et encadrés par un architecte et des entreprises locales de confiance, et qu’il a respecté les normes imposées.', 'Nous attendons tous la suite de cet affrontement bordelais ! Même si il est accusé de profiter de sa notoriété pour obtenir des passe-droits, notre Phillipe semble, malgré tout, motivé par pleins de bonnes intentions et ne compte pas se faire avoir comme un bleu. Il ne va pas abandonner “le rêve d’une vie” (20 min).  Alors vous en pensez quoi ? Pour Etchebest (Golliath) ou pour le voisin (David) ? Choisissez votre camp !', 'imgArt21.jpg', 0, 'ANGL1801', 'THE0101', 'FRAN01'),
('22', '2020-03-28', 'La v&eacute;rit&eacute; sur Bordeaux: une ville plus bleu que rouge.', 'Bordeaux n''a de rouge que son nom. Nous associons toutes et tous cette couleur &agrave; notre ville favorite et, faisons erreur depuis le d&eacute;part. Le bleu est bien plus omnipr&eacute;sent au sein de celle-ci la repr&eacute;sente bien mieux. Nous allons voir pourquoi ensemble.', 'Avant de rentrer dans le vif de sujet, voyons ensemble pourquoi Bordeaux est nomm&eacute; ainsi.', 'La capitale du vin ne tire pas son nom de la couleur, mais c''est bel et bien la couleur qui tire son nom de la ville. Bordeaux est entour&eacute;e de nombreux vignobles, avec un total d''environ 14 000 producteurs de vins. La couleur bordeaux a vu le jour suite &agrave; la teinte rouge violac&eacute; de cet alcool. Donc non, Bordeaux n''a pas pris son nom d''une couleur. Mais alors, d''o&ugrave; provient ce nom ? Malheureusement, il est impossible pour nous d''avoir une r&eacute;ponse concr&egrave;te &agrave; ce jour, m&ecirc;me si plusieurs pistes nous sont emmen&eacute;es. Son nom pourrait &ecirc;tre d&ucirc; au terme Burdigala, &eacute;tant la capitale des Bituriges Vivisques, les premiers habitants de Bordeaux. L''auteur Ren&eacute; Lafon pense quant &agrave; lui que Bordeaux est un mot d''origine arabe et, serait la contraction des mots burd et cala. Enfin, tout &ccedil;a pour vous dire que Bordeaux n''est pas la ville du rouge, mais que beaucoup pensent ainsi d&ucirc; la couleur cr&eacute;&eacute;e gr&acirc;ce &agrave; son vin. Cette couleur ne se retrouve en rien dans l''architecture de notre ville bien aim&eacute;.', 'Toutes les nuances de bleu se manifestant dans Bordeaux', 'Outre le vin, Bordeaux est connu pour son port de la Lune. Et bien, le bleu domine en grande partie celui-ci. Tout le mobilier urbain est une nuance de notre couleur favorite, que ce soit ces majestueux lampadaires bleu marines surplombant la chauss&eacute;e, ou bien les toitures couleurs ardoises longeant le port. Il ne faut &eacute;galement pas oublier le miroir d''eau, qui est un lieu symbolique de Bordeaux, l&agrave; o&ugrave; le ciel et l''eau ne font qu''un et, o&ugrave; la brume s''invite durant les p&eacute;riodes les plus s&egrave;ches. Le bleu de Bordeaux s''&eacute;tend &eacute;videmment bien plus loin qu''au port de la Lune. Les moyens de transports, comme les tramways ou les bus que nous pouvons observer dans toute la ville, repr&eacute;sentent fi&egrave;rement cette couleur. Nous la retrouvons &eacute;galement avec le lion bleu, un symbole m&ecirc;me de Bordeaux. Si vous voulez obtenir plus d''informations sur celui-ci, vous pouvez vous rendre &agrave; l''article suivant: Le bleu n''est pas seulement pr&eacute;sent dans l''architecture, mais &eacute;galement dans les noms. Le Cabaret Bleu, l''Ange Bleu, l''Oiseau Bleu, le Grand Bleu, France Bleu Gironde&hellip;qu''il s''agisse de cabaret ou de radio, le mot bleu est tr&egrave;s pr&eacute;sent dans la capitale de la Nouvelle-Aquitaine.', 'En quoi le bleu s&rsquo;impose devant le rouge', 'Pourquoi il n''y a pas de rouge dans Bordeaux ? Je vous laisse imaginer une ville couleur bordeaux. Notre r&eacute;tine ne le supporterait pas tr&egrave;s longtemps. L''architecte Marie-Pierre Serventie a prononc&eacute; les mots &ldquo;Il y a d&eacute;j&agrave; le vin. L''imaginaire suffit&rdquo;. Et donc, pourquoi avoir choisi le bleu ? Le bleu permet de mettre en avant ce qui repr&eacute;sente Bordeaux, les aspects que la ville veut faire ressortir, tout en s''additionnant facilement au d&eacute;cors. Il concorde avec la couleur du fleuve et du ciel, tr&egrave;s visible &eacute;tant donn&eacute; la basse hauteur des &eacute;difices. Cette couleur s''associe parfaitement bien au gris, une teinte tr&egrave;s pr&eacute;sente dans la ville. Le bleu fait r&eacute;f&eacute;rence aux r&ecirc;ves, &agrave; la fra&icirc;cheur, &agrave; la v&eacute;rit&eacute;.. c''est &eacute;galement l''une des couleurs favorites des Europ&eacute;ens. Le rouge est bien plus compliqu&eacute; &agrave; d&eacute;finir et, peut aussi bien repr&eacute;senter l''amour et le courage, que la luxure ou les enfers. Le bleu est alors un choix plus judicieux que le rouge dans l''ensemble de ces aspects et renvoie l''image d''une ville sereine.', 'Vous savez maintenant pourquoi le bleu est grandement pr&eacute;sent dans l''enceinte de Bordeaux et ne verrez plus cette ville comme la repr&eacute;sentante d''une teinte rouge violac&eacute;. Vous pourrez &eacute;galement exposer votre culture du bleu dans la capitale du vin durant votre prochain repas de famille.', 'imgArt22.jpg', 0, 'ANGL1901', 'THE0104', 'FRAN01'),
('23', '2020-03-29', 'Le Lion bleu de Bordeaux, star des r&eacute;seaux sociaux', 'Surplombant la place Stalingrad, anciennement place du Pont, et faisant fi&egrave;rement face au pont de Pierre, le Lion bleu de Xavier Veilhan fait depuis 2005 l&rsquo;objet de toutes les convoitises.', 'En France, depuis 1951 et l&rsquo;arr&ecirc;t&eacute; des &ldquo;1% artistique&rdquo;, toute construction d&rsquo;un b&acirc;timent public ayant pour but d&rsquo;accueillir du monde doit pr&eacute;voir 1% de son budget total pour financer des oeuvres d&rsquo;art aux abords du b&acirc;timent.', 'En construisant les lignes de tramway, la ville de Bordeaux et sa m&eacute;tropole ont donc mis en place le programme &ldquo;L&rsquo;art dans la ville&rdquo;. Supervis&eacute; par le directeur du Centre Georges-Pompidou, cette initiative a pu d&eacute;bloquer plusieurs millions d&rsquo;euros depuis 2000 pour la r&eacute;alisation d&rsquo;une quinzaine d&rsquo;oeuvres. Parmi ces oeuvres, nous pouvons noter &ldquo;La maison aux personnages&rdquo; place Am&eacute;lie Raba L&eacute;on, les affiches &ldquo;Aux bord&rsquo;eaux&rdquo; pr&eacute;sentes dans toutes les stations ou bien le fameux Lion bleu bordelais. Mise en place et viss&eacute;e sur les pav&eacute;s de la rive droite le 30 juin 2005, cette sculpture en plastique mesure 6 m&egrave;tres de haut. Elle va de pair avec la mise en service de la premi&egrave;re ligne de tramway dans Bordeaux, la ligne A, qui traverse le pont de Pierre et la place Stalingrad. En d&eacute;calage total par rapport au style architectural tr&egrave;s XVIII&egrave;me de la ville, cette oeuvre a d&rsquo;abord &eacute;t&eacute; massivement rejet&eacute;e par les habitants du quartier, mais ils l&rsquo;ont d&eacute;sormais adopt&eacute;e.', 'Un symbole de la rive droite', 'On n&rsquo;imagine pas la place Stalingrad sans cet imposant f&eacute;lin color&eacute;. Ce lion bleu est devenu l''embl&egrave;me de cette place et, pour les habitants de la rive gauche, c&rsquo;est le symbole de &ldquo;l&rsquo;autre rive&rdquo;, c&rsquo;est la premi&egrave;re chose que l&rsquo;on voit en traversant la Garonne depuis le quartier de Saint-Michel. Ce lion bleu, on s&rsquo;y abrite, on s&rsquo;y donne rendez-vous, on s&rsquo;en sert de rep&egrave;re et les &eacute;coliers y prennent souvent leur premier cours d&rsquo;art contemporain. Ce lion bleu n&rsquo;est pour certain qu&rsquo;un gros point azur pixelis&eacute; &agrave; l&rsquo;horizon, mais pour d&rsquo;autres c&rsquo;est un symbole, un mirage, comme un gros jouet qu''on ne perd jamais. Et ce gros jouet, des centaines d&rsquo;internautes se le sont attribu&eacute; et en parlent sur Instagram via le #lionbleu. Ils postent r&eacute;guli&egrave;rement des photos de lui, toujours dans la m&ecirc;me posture, veillant sur la ville de Bordeaux. D&rsquo;objet d&rsquo;art &agrave; star du net, il n&rsquo;y a qu&rsquo;un pas. Et ce pas, le Lion de Veilhan l&rsquo;a franchi comme il franchirait la Garonne pour rejoindre le centre-ville bordelais. En plus de son esth&eacute;tique remarquable, son cr&eacute;ateur n&rsquo;a pas omis de lui donner un sens propre en prenant en compte l&rsquo;environnement qui entoure cette statue bestiale.', 'Un tremplin pour Xavier Veilhan', 'L&rsquo;artiste plasticien &agrave; l&rsquo;origine du Lion bleu, dipl&ocirc;m&eacute; de l''EnsAD-Paris (&Eacute;cole Nationale Sup&eacute;rieure des Arts D&eacute;coratifs) et officier de l&rsquo;Ordre des Arts et des Lettres, n&rsquo;a pas choisi une figure animali&egrave;re pour rien. La place Stalingrad est un hommage &agrave; la victoire de l&rsquo;arm&eacute;e sovi&eacute;tique durant la Seconde Guerre Mondiale. Xavier Veilhan souhaitait donc offrir &agrave; ce lieu une &oelig;uvre monumentale qui renforce son identit&eacute;. &Agrave; l&rsquo;instar du Lion de Belfort de Bartholdi, il a donc choisi cet animal pour ses valeurs de force tranquille, se battant pour la justice avec puissance mais intelligence. Il d&eacute;clarait, avant sa construction, vouloir quelque chose de tot&eacute;mique, &agrave; la fois dominant et protecteur. Il ne reste plus qu&rsquo;&agrave; esp&eacute;rer qu&rsquo;il seconde Bordeaux et ses habitants dans leur quotidien futur. Le sculpteur du Lion a vu sa c&ocirc;te mondiale grimper suite &agrave; la r&eacute;alisation de cette oeuvre. Il a, depuis, pu exposer un Carrosse violet &agrave; Versailles en 2009, un Skateur bleu en Cor&eacute;e du Sud en 2014, ou encore Romy, une femme jaune, devant la gare de Lille en 2019.', 'Esp&eacute;rons que cet &eacute;lan de cr&eacute;ativit&eacute; se poursuive et que, par la suite, Xavier Veilhan r&eacute;utilise cette couleur qui nous est si ch&egrave;re, le bleu.', 'imgArt23.jpg', 0, 'ANGL2001', 'THE0104', 'FRAN01'),
('24', '2020-03-29', 'Le nouveau logo des girondin : &agrave; prendre ou &agrave; laisser ?', 'Il y a d&eacute;j&agrave; quelques semaines, la direction annon&ccedil;ait une refonte du logo des Girondins de Bordeaux dans un objectif purement financier. Mais c&rsquo;est sans compter sur l&rsquo;avis des supporters les plus fid&egrave;les qui s&rsquo;y oppose froidement.', 'Pensez-vous n&eacute;cessaire ce changement de logo ?', '&Agrave; vrai dire, aujourd''hui le football subit des changements drastiques, tout comme le monde du sport qui lui-m&ecirc;me &eacute;volue tr&egrave;s rapidement. Les Girondins d&eacute;veloppent aujourd''hui un nouveau projet, une nouvelle ambition, au c&oelig;ur d''une nouvelle d&eacute;cennie. Il est tout &agrave; fait logique que la question de la refonte du logo soit pos&eacute;e et que l''&eacute;quipe y r&eacute;fl&eacute;chisse. C''est d''ailleurs un levier essentiel que choisissent g&eacute;n&eacute;ralement les grands clubs pour s''affirmer dans le monde entier, gr&acirc;ce &agrave; une identit&eacute; marqu&eacute;e et singuli&egrave;re. De plus, un logo repr&eacute;sente le club, son histoire, ses racines, mais aussi dans l''&egrave;re du foot business il repr&eacute;sente aussi la marque et le club. Seulement un probl&egrave;me dans ce changement de logo se fait ressentir. Il est vrai que l''on peut remarquer une flagrante ressemblance avec l''actuel logo du Melbourne Victory (Australie). De plus, ils souhaitent la suppression du mot girondin afin de mettre en avant, en priorit&eacute; le mot (la marque) Bordeaux, ce qui g&eacute;n&egrave;re un autre sujet de divergence entre les dirigeants du club et les supporters qui n''adh&egrave;rent pas &agrave; cette id&eacute;e.', 'Ce changement de logo renierait-il l''histoire des girondins ?', 'Saviez vous que le club &agrave; cette ann&eacute;e 139 ans ? Le plus fou dans cela est le nombre de logo que cette &eacute;quipe a fi&egrave;rement port&eacute;. Exactement 4 blasons diff&eacute;rent et prochainement peut &ecirc;tre un cinqui&egrave;me. Le logo actuel est un bouclier en bleu et en blanc qui sont les couleurs embl&eacute;matique de Bordeaux contrairement &agrave; ce que pense les gens. Les &eacute;l&eacute;ments du logo sont constitu&eacute;s de l&rsquo;inscription &ldquo;Football Club des Girondins de Bordeaux&rdquo; qui est le nom complet du club. Cette union a &eacute;t&eacute; cr&eacute;&eacute; le 2 juillet 1936 par la fusion de plusieurs &eacute;quipes. Bien &eacute;videmment les nombres 1881 repr&eacute;sente la date de cr&eacute;ation du club. Et concernant le caract&egrave;re situ&eacute; entre le &lsquo;F&rsquo; et le &lsquo;C&rsquo; c&rsquo;est un triquetrum, un ancien signe celtes.\r\nUn fait amusant est que selon une des versions, les triquetrum seraient des croissants, dont la recette venait des Turc et aurait &eacute;t&eacute; import&eacute; en France. Et selon une deuxi&egrave;me versions le monogramme serait li&eacute; au Port de la Lune, le centre historique de Bordeaux, qui se trouve sur la courbe de la Garonne.\r\nIl ne faut pas oublier le scapulaire qui est lui aussi pr&eacute;sent sur le maillot, il repr&eacute;sente un symbole tr&egrave;s fort pour les Girondins de Bordeaux !', 'Le changement de logo du point de vue des supporters', 'Vous vous en doutez s&ucirc;rement, mais un changement de logo n''est pas le bienvenu pour tout le monde. Pour les supporters ce changement de logo n''est pas justifi&eacute;. M&ecirc;me les plus grands supporters du club comme les Ultramarines s''oppose &agrave; cette id&eacute;e, car le club n''aurait aucune l&eacute;gitimit&eacute; &agrave; toucher &agrave; cette chose aussi sacr&eacute; qui est le logo des Girondins, de plus ils ajoutent &agrave; ce fait que le logo ne serait qu''une copie d&rsquo;un logo existant . De son c&ocirc;t&eacute; Laurent Brun &agrave; lui m&ecirc;me partag&eacute; son ressenti vis-&agrave;-vis de ce changement brutal et peu justifi&eacute;. Il &eacute;nonce clairement que toucher &agrave; un symbole aussi important n''est pas aussi simple que cela en a l''air, il va encore plus loin et critique m&ecirc;me le club en disant qu''actuellement tout est compliqu&eacute; avec le patrimoine du club, que celui si est bafou&eacute; et galvaud.. De plus, si on se penche sur l''avis direct des fans on peut clairement remarquer qu''une majorit&eacute; de la communaut&eacute; qui suit les Girondins repousse cette id&eacute;e de refonte de logo, car le mot girondin devrait &ecirc;tre supprim&eacute; pour laisser place &agrave; un Bordeaux plus grand. C''est &eacute;videmment tr&egrave;s mal vu car les supporters souhaitent &agrave; tout prix garder l''inscription Girondins de Bordeaux.', 'Encore aujourd&rsquo;hui le nouveau logo des Girondins fait parler de lui. Doit-il &ecirc;tre abandonn&eacute; ? Ou alors achev&eacute; pour relancer l&rsquo;image du club ? Malheureusement actuellement aucune nouvelle sur l&rsquo;avancement du logo&hellip; Et vous qu&rsquo;en pensez-vous? Pour ou contre ce nouveau logo ?', 'imgArt24.jpg', 0, 'ANGL2101', 'THE0104', 'FRAN01');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `NumCom` char(6) NOT NULL,
  `DtCreC` datetime DEFAULT NULL,
  `PseudoAuteur` char(20) NOT NULL,
  `EmailAuteur` char(60) NOT NULL,
  `TitrCom` char(60) NOT NULL,
  `LibCom` text NOT NULL,
  `NumArt` char(10) NOT NULL,
  PRIMARY KEY (`NumCom`),
  KEY `COMMENT_FK` (`NumCom`),
  KEY `FK_ASSOCIATION_7` (`NumArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`NumCom`, `DtCreC`, `PseudoAuteur`, `EmailAuteur`, `TitrCom`, `LibCom`, `NumArt`) VALUES
('001', '2020-01-09 10:13:43', 'Phil09', 'Phil09@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('002', '2020-01-02 13:18:42', 'TomyBl', 'TomyBl@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('003', '2020-01-04 16:21:12', 'Chouchou', 'Chouchou@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('004', '2020-01-05 03:15:38', 'Titi', 'Titi@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('005', '2020-01-06 21:16:36', 'Kiss', 'Kiss@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('007', '2020-01-08 08:41:12', 'Silou', 'silou@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('008', '2020-01-09 18:24:21', 'Phil09', 'Phil09@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('009', '2020-01-02 16:29:16', 'TomyBl', 'TomyBl@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('010', '2020-01-04 08:16:44', 'Chouchou', 'Chouchou@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('011', '2020-01-05 14:27:39', 'Titi', 'Titi@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('012', '2020-01-06 06:31:42', 'Kiss', 'Kiss@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('013', '2020-01-06 23:50:27', 'Biss', 'Biss@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('014', '2020-01-08 10:37:23', 'Silou', 'silou@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('015', '2020-01-09 15:31:17', 'Phil09', 'Phil09@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('016', '2020-02-15 08:31:23', 'TomyBl', 'TomyBl@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('017', '2020-02-19 06:28:00', 'Counter99', 'Counter99@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('018', '2020-02-28 07:30:21', 'Sisley33', 'Sisley33@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('019', '2020-02-29 17:31:38', 'Archie', 'Archie@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('020', '2020-02-29 09:31:27', 'Will''s', 'Wills@me.com', 'Trop cool comme article', 'Trop cool comme article', '14'),
('021', '2020-03-02 16:33:41', 'Kiss29', 'Kiss29@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('022', '2020-03-03 12:41:47', 'Will''s', 'Wills@me.com', 'Trop cool comme article', 'Trop cool comme article', '13'),
('023', '2020-03-04 10:33:42', 'Silou', 'silou@me.com', 'Trop cool comme article', 'Trop cool comme article', '14'),
('28', '2020-03-17 18:24:03', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '10'),
('29', '2020-03-23 15:58:52', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '17'),
('30', '2020-03-23 16:01:52', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '17'),
('31', '2020-03-23 16:03:21', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '17'),
('32', '2020-03-23 17:46:53', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '17'),
('33', '2020-03-23 18:11:50', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '09'),
('34', '2020-03-23 22:50:23', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '11'),
('35', '2020-03-23 22:50:34', 'Maelle05', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '11'),
('36', '2020-03-25 15:21:29', 'Mama', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '17'),
('37', '2020-03-27 11:02:49', 'Mama', 'maelle.rabouan@gmail.com', 'kjmqskgjfhmslgiufhdvb jk  skjmqkjdhiouh slkfhqmoiuhdf qid si', 'kjmqskgjfhmslgiufhdvb jk  skjmqkjdhiouh slkfhqmoiuhdf qid siuhghfygk  y kujyu ouyfihg fjiytrikhgf u', '17'),
('38', '2020-03-28 20:06:44', 'Mama', 'maelle.rabouan@gmail.com', 'trop bien c''est trop cool', 'trop bien c''est trop cool', '19'),
('39', '2020-03-28 20:13:50', 'Mama', 'maelle.rabouan@gmail.com', 'le meilleur article !!!', 'le meilleur article !!!', '18');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `DtJour` datetime NOT NULL,
  PRIMARY KEY (`DtJour`),
  KEY `DATE_FK` (`DtJour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`DtJour`) VALUES
('2017-12-12 00:00:00'),
('2018-11-09 00:00:00'),
('2018-12-01 00:00:00'),
('2018-12-12 00:00:00'),
('2018-12-12 09:00:00'),
('2018-12-12 11:00:00'),
('2018-12-13 00:00:00'),
('2018-12-17 00:00:00'),
('2018-12-18 00:00:00'),
('2019-01-11 00:00:00'),
('2019-01-13 00:00:00'),
('2019-01-17 00:00:00'),
('2019-02-22 14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `NumLang` char(8) NOT NULL,
  `Lib1Lang` char(25) DEFAULT NULL,
  `Lib2Lang` char(45) DEFAULT NULL,
  `NumPays` char(4) DEFAULT NULL,
  PRIMARY KEY (`NumLang`),
  KEY `LANGUE_FK` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`NumLang`, `Lib1Lang`, `Lib2Lang`, `NumPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS'),
('UKRA01', 'Ukrainien(ne)', 'Langue ukrainienne', 'UKRA');

-- --------------------------------------------------------

--
-- Table structure for table `motcle`
--

CREATE TABLE IF NOT EXISTS `motcle` (
  `NumMoCle` char(8) NOT NULL,
  `LibMoCle` char(30) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumMoCle`),
  KEY `MOTCLE_FK` (`NumMoCle`),
  KEY `FK_ASSOCIATION_5` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motcle`
--

INSERT INTO `motcle` (`NumMoCle`, `LibMoCle`, `NumLang`) VALUES
('MTCL0101', 'Mot1', 'FRAN01'),
('MTCL0102', 'Mot2', 'FRAN01'),
('MTCL0103', 'Mot3', 'FRAN01'),
('MTCL0104', 'Mot4', 'FRAN01'),
('MTCL0105', 'Mot5', 'FRAN01'),
('MTCL0106', 'Mot6', 'FRAN01'),
('MTCL0107', 'Mot7', 'FRAN01'),
('MTCL0108', 'Mot8', 'FRAN01'),
('MTCL0109', 'Mot9', 'FRAN01'),
('MTCL0110', 'Mot10', 'FRAN01'),
('MTCL0111', 'Mot11', 'FRAN01'),
('MTCL0112', 'Mot12', 'FRAN01'),
('MTCL0113', 'Mot13', 'FRAN01'),
('MTCL0114', 'Mot14', 'FRAN01'),
('MTCL0115', 'Mot15', 'FRAN01'),
('MTCL0116', 'Bordeaux', 'FRAN01'),
('MTCL0117', 'CHU', 'FRAN01'),
('MTCL0118', 'H&ocirc;pital', 'FRAN01'),
('MTCL0119', 'Bleu', 'FRAN01'),
('MTCL0120', 'Base sous-marine', 'FRAN01'),
('MTCL0121', 'Art', 'FRAN01'),
('MTCL0122', 'histoire', 'FRAN01'),
('MTCL0123', 'Symbole', 'FRAN01'),
('MTCL0124', 'Blason', 'FRAN01'),
('MTCL0125', 'Etchebest', 'FRAN01'),
('MTCL0126', 'Conflit', 'FRAN01'),
('MTCL0127', 'Chartrons', 'FRAN01'),
('MTCL0128', 'Restaurant', 'FRAN01'),
('MTCL0129', 'Construction', 'FRAN01'),
('MTCL0130', 'Lion', 'FRAN01'),
('MTCL0131', 'Sculpture', 'FRAN01'),
('MTCL0132', 'stalingrad', 'FRAN01'),
('MTCL0133', 'veilhan', 'FRAN01'),
('MTCL0134', 'girondins', 'FRAN01'),
('MTCL0135', 'logo', 'FRAN01'),
('MTCL0136', 'Ultramarines', 'FRAN01'),
('MTCL0137', 'football', 'FRAN01'),
('MTCL0138', 'Vin', 'FRAN01'),
('MTCL0139', 'rouge', 'FRAN01'),
('MTCL0140', 'port de la Lune', 'FRAN01'),
('MTCL0141', 'histoire', 'FRAN01'),
('MTCL0142', 'miroir d&rsquo;eau', 'FRAN01'),
('MTCL0201', 'Word1', 'ANGL01'),
('MTCL0202', 'Word2', 'ANGL01'),
('MTCL0203', 'Word3', 'ANGL01'),
('MTCL0204', 'Word4', 'ANGL01'),
('MTCL0205', 'Word5', 'ANGL01'),
('MTCL0206', 'Word6', 'ANGL01'),
('MTCL0207', 'Word7', 'ANGL01'),
('MTCL0208', 'Word8', 'ANGL01'),
('MTCL0209', 'Word9', 'ANGL01'),
('MTCL0210', 'Word10', 'ANGL01'),
('MTCL0211', 'Word11', 'ANGL01'),
('MTCL0212', 'Word12', 'ANGL01'),
('MTCL0301', 'Wort1', 'ALLE01'),
('MTCL0302', 'Wort2', 'ALLE01'),
('MTCL0303', 'Wort3', 'ALLE01'),
('MTCL0304', 'Wort4', 'ALLE01'),
('MTCL0305', 'Wort5', 'ALLE01'),
('MTCL0306', 'Wort6', 'ALLE01'),
('MTCL0307', 'Wort7', 'ALLE01'),
('MTCL0308', 'Wort8', 'ALLE01'),
('MTCL0309', 'Wort9', 'ALLE01'),
('MTCL0310', 'Wort10', 'ALLE01'),
('MTCL0311', 'Wort11', 'ALLE01'),
('MTCL0312', 'Wort12', 'ALLE01'),
('MTCL0401', 'дума 1', 'BULG01'),
('MTCL0402', 'дума 2', 'BULG01'),
('MTCL0403', 'дума 3', 'BULG01'),
('MTCL0404', 'дума 4', 'BULG01'),
('MTCL0405', 'дума 5', 'BULG01'),
('MTCL0406', 'дума 6', 'BULG01'),
('MTCL0501', 'Palabra 1', 'ESPA01'),
('MTCL0502', 'Palabra 2', 'ESPA01'),
('MTCL0503', 'Palabra 3', 'ESPA01'),
('MTCL0504', 'Palabra 4', 'ESPA01'),
('MTCL0505', 'Palabra 5', 'ESPA01'),
('MTCL0506', 'Palabra 6', 'ESPA01'),
('MTCL0601', 'Parola 1', 'ITAL01'),
('MTCL0602', 'Parola 2', 'ITAL01'),
('MTCL0603', 'Parola 3', 'ITAL01'),
('MTCL0604', 'Parola 4', 'ITAL01'),
('MTCL0605', 'Parola 5', 'ITAL01'),
('MTCL0606', 'Parola 6', 'ITAL01'),
('MTCL0701', 'Cлово 1', 'RUSS01'),
('MTCL0702', 'Cлово 2', 'RUSS01'),
('MTCL0703', 'Cлово 3', 'RUSS01'),
('MTCL0704', 'Cлово 4', 'RUSS01'),
('MTCL0705', 'Cлово 5', 'RUSS01'),
('MTCL0706', 'Cлово 6', 'RUSS01');

-- --------------------------------------------------------

--
-- Table structure for table `motclearticle`
--

CREATE TABLE IF NOT EXISTS `motclearticle` (
  `NumArt` char(10) NOT NULL,
  `NumMoCle` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`,`NumMoCle`),
  KEY `MOTCLEARTICLE_FK` (`NumArt`),
  KEY `MOTCLEARTICLE2_FK` (`NumMoCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motclearticle`
--

INSERT INTO `motclearticle` (`NumArt`, `NumMoCle`) VALUES
('09', 'MTCL0101'),
('10', 'MTCL0101'),
('10', 'MTCL0102'),
('10', 'MTCL0104'),
('11', 'MTCL0104'),
('10', 'MTCL0106'),
('11', 'MTCL0107'),
('10', 'MTCL0108'),
('11', 'MTCL0108'),
('11', 'MTCL0109'),
('18', 'MTCL0116'),
('19', 'MTCL0116'),
('20', 'MTCL0116'),
('18', 'MTCL0117'),
('18', 'MTCL0118'),
('18', 'MTCL0119'),
('19', 'MTCL0120'),
('19', 'MTCL0121'),
('23', 'MTCL0121'),
('19', 'MTCL0122'),
('20', 'MTCL0122'),
('22', 'MTCL0122'),
('20', 'MTCL0123'),
('20', 'MTCL0124'),
('21', 'MTCL0125'),
('21', 'MTCL0126'),
('21', 'MTCL0127'),
('21', 'MTCL0128'),
('21', 'MTCL0129'),
('23', 'MTCL0130'),
('23', 'MTCL0131'),
('23', 'MTCL0132'),
('23', 'MTCL0133'),
('24', 'MTCL0134'),
('24', 'MTCL0135'),
('24', 'MTCL0136'),
('24', 'MTCL0137'),
('22', 'MTCL0138'),
('22', 'MTCL0139'),
('22', 'MTCL0140'),
('22', 'MTCL0142'),
('14', 'MTCL0202'),
('15', 'MTCL0203'),
('15', 'MTCL0208'),
('15', 'MTCL0210'),
('15', 'MTCL0211'),
('16', 'MTCL0301'),
('16', 'MTCL0303'),
('16', 'MTCL0305'),
('16', 'MTCL0307'),
('16', 'MTCL0308'),
('16', 'MTCL0310'),
('16', 'MTCL0311'),
('16', 'MTCL0312');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `cdPays` char(2) NOT NULL,
  `numPays` char(4) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPays`),
  KEY `PAYS_FK` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=239 ;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`idPays`, `cdPays`, `numPays`, `frPays`, `enPays`) VALUES
(1, 'AF', 'AFGH', 'Afghanistan', 'Afghanistan'),
(2, 'ZA', 'AFRI', 'Afrique du Sud', 'South Africa'),
(3, 'AL', 'ALBA', 'Albanie', 'Albania'),
(4, 'DZ', 'ALGE', 'Algérie', 'Algeria'),
(5, 'DE', 'ALLE', 'Allemagne', 'Germany'),
(6, 'AD', 'ANDO', 'Andorre', 'Andorra'),
(7, 'AO', 'ANGO', 'Angola', 'Angola'),
(8, 'AI', 'ANGU', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'ARTA', 'Antarctique', 'Antarctica'),
(10, 'AG', 'ANTG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
(11, 'AN', 'ANTI', 'Antilles néerlandaises', 'Netherlands Antilles'),
(12, 'SA', 'ARAB', 'Arabie saoudite', 'Saudi Arabia'),
(13, 'AR', 'ARGE', 'Argentine', 'Argentina'),
(14, 'AM', 'ARME', 'Arménie', 'Armenia'),
(15, 'AW', 'ARUB', 'Aruba', 'Aruba'),
(16, 'AU', 'AUST', 'Australie', 'Australia'),
(17, 'AT', 'AUTR', 'Autriche', 'Austria'),
(18, 'AZ', 'AZER', 'Azerbaïdjan', 'Azerbaijan'),
(19, 'BJ', 'BENI', 'Bénin', 'Benin'),
(20, 'BS', 'BAHA', 'Bahamas', 'Bahamas, The'),
(21, 'BH', 'BAHR', 'Bahreïn', 'Bahrain'),
(22, 'BD', 'BANG', 'Bangladesh', 'Bangladesh'),
(23, 'BB', 'BARB', 'Barbade', 'Barbados'),
(24, 'PW', 'BELA', 'Belau', 'Palau'),
(25, 'BE', 'BELG', 'Belgique', 'Belgium'),
(26, 'BZ', 'BELI', 'Belize', 'Belize'),
(27, 'BM', 'BERM', 'Bermudes', 'Bermuda'),
(28, 'BT', 'BHOU', 'Bhoutan', 'Bhutan'),
(29, 'BY', 'BIEL', 'Biélorussie', 'Belarus'),
(30, 'MM', 'BIRM', 'Birmanie', 'Myanmar (ex-Burma)'),
(31, 'BO', 'BOLV', 'Bolivie', 'Bolivia'),
(32, 'BA', 'BOSN', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
(33, 'BW', 'BOTS', 'Botswana', 'Botswana'),
(34, 'BR', 'BRES', 'Brésil', 'Brazil'),
(35, 'BN', 'BRUN', 'Brunei', 'Brunei Darussalam'),
(36, 'BG', 'BULG', 'Bulgarie', 'Bulgaria'),
(37, 'BF', 'BURK', 'Burkina Faso', 'Burkina Faso'),
(38, 'BI', 'BURU', 'Burundi', 'Burundi'),
(39, 'CI', 'IVOI', 'Côte d''Ivoire', 'Ivory Coast (see Cote d''Ivoire)'),
(40, 'KH', 'CAMB', 'Cambodge', 'Cambodia'),
(41, 'CM', 'CAME', 'Cameroun', 'Cameroon'),
(42, 'CA', 'CANA', 'Canada', 'Canada'),
(43, 'CV', 'CVER', 'Cap-Vert', 'Cape Verde'),
(44, 'CL', 'CHIL', 'Chili', 'Chile'),
(45, 'CN', 'CHIN', 'Chine', 'China'),
(46, 'CY', 'CHYP', 'Chypre', 'Cyprus'),
(47, 'CO', 'COLO', 'Colombie', 'Colombia'),
(48, 'KM', 'COMO', 'Comores', 'Comoros'),
(49, 'CG', 'CONG', 'Congo', 'Congo'),
(50, 'KP', 'CNOR', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
(51, 'KR', 'CSUD', 'Corée du Sud', 'Korea, (South) Republic of'),
(52, 'CR', 'RICA', 'Costa Rica', 'Costa Rica'),
(53, 'HR', 'CROA', 'Croatie', 'Croatia'),
(54, 'CU', 'CUBA', 'Cuba', 'Cuba'),
(55, 'DK', 'DANE', 'Danemark', 'Denmark'),
(56, 'DJ', 'DJIB', 'Djibouti', 'Djibouti'),
(57, 'DM', 'DOMI', 'Dominique', 'Dominica'),
(58, 'EG', 'EGYP', 'Égypte', 'Egypt'),
(59, 'AE', 'EMIR', 'Émirats arabes unis', 'United Arab Emirates'),
(60, 'EC', 'EQUA', 'Équateur', 'Ecuador'),
(61, 'ER', 'ERYT', 'Érythrée', 'Eritrea'),
(62, 'ES', 'ESPA', 'Espagne', 'Spain'),
(63, 'EE', 'ESTO', 'Estonie', 'Estonia'),
(64, 'US', 'USA_', 'États-Unis', 'United States'),
(65, 'ET', 'ETHO', 'Éthiopie', 'Ethiopia'),
(66, 'FI', 'FINL', 'Finlande', 'Finland'),
(67, 'FR', 'FRAN', 'France', 'France'),
(68, 'GE', 'GEOR', 'Géorgie', 'Georgia'),
(69, 'GA', 'GABO', 'Gabon', 'Gabon'),
(70, 'GM', 'GAMB', 'Gambie', 'Gambia, the'),
(71, 'GH', 'GANA', 'Ghana', 'Ghana'),
(72, 'GI', 'GIBR', 'Gibraltar', 'Gibraltar'),
(73, 'GR', 'GREC', 'Grèce', 'Greece'),
(74, 'GD', 'GREN', 'Grenade', 'Grenada'),
(75, 'GL', 'GROE', 'Groenland', 'Greenland'),
(76, 'GP', 'GUAD', 'Guadeloupe', 'Guinea, Equatorial'),
(77, 'GU', 'GUAM', 'Guam', 'Guam'),
(78, 'GT', 'GUAT', 'Guatemala', 'Guatemala'),
(79, 'GN', 'GUIN', 'Guinée', 'Guinea'),
(80, 'GQ', 'GUIE', 'Guinée équatoriale', 'Equatorial Guinea'),
(81, 'GW', 'GUIB', 'Guinée-Bissao', 'Guinea-Bissau'),
(82, 'GY', 'GUYA', 'Guyana', 'Guyana'),
(83, 'GF', 'GUYF', 'Guyane française', 'Guiana, French'),
(84, 'HT', 'HAIT', 'Haïti', 'Haiti'),
(85, 'HN', 'HOND', 'Honduras', 'Honduras'),
(86, 'HK', 'KONG', 'Hong Kong', 'Hong Kong, (China)'),
(87, 'HU', 'HONG', 'Hongrie', 'Hungary'),
(88, 'BV', 'BOUV', 'Ile Bouvet', 'Bouvet Island'),
(89, 'CX', 'CHRI', 'Ile Christmas', 'Christmas Island'),
(90, 'NF', 'NORF', 'Ile Norfolk', 'Norfolk Island'),
(91, 'KY', 'CAYM', 'Iles Cayman', 'Cayman Islands'),
(92, 'CK', 'COOK', 'Iles Cook', 'Cook Islands'),
(93, 'FO', 'FERO', 'Iles Féroé', 'Faroe Islands'),
(94, 'FK', 'FALK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
(95, 'FJ', 'FIDJ', 'Iles Fidji', 'Fiji'),
(96, 'GS', 'GEOR', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
(97, 'HM', 'HEAR', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
(98, 'MH', 'MARS', 'Iles Marshall', 'Marshall Islands'),
(99, 'PN', 'PITC', 'Iles Pitcairn', 'Pitcairn Island'),
(100, 'SB', 'SALO', 'Iles Salomon', 'Solomon Islands'),
(101, 'SJ', 'SVAL', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
(102, 'TC', 'TURK', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
(103, 'VI', 'VIEA', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
(104, 'VG', 'VIEB', 'Iles Vierges britanniques', 'Virgin Islands, British'),
(105, 'CC', 'COCO', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
(106, 'UM', 'MINE', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
(107, 'IN', 'INDE', 'Inde', 'India'),
(108, 'ID', 'INDO', 'Indonésie', 'Indonesia'),
(109, 'IR', 'IRAN', 'Iran', 'Iran, Islamic Republic of'),
(110, 'IQ', 'IRAQ', 'Iraq', 'Iraq'),
(111, 'IE', 'IRLA', 'Irlande', 'Ireland'),
(112, 'IS', 'ISLA', 'Islande', 'Iceland'),
(113, 'IL', 'ISRA', 'Israël', 'Israel'),
(114, 'IT', 'ITAL', 'Italie', 'Italy'),
(115, 'JM', 'JAMA', 'Jamaïque', 'Jamaica'),
(116, 'JP', 'JAPO', 'Japon', 'Japan'),
(117, 'JO', 'JORD', 'Jordanie', 'Jordan'),
(118, 'KZ', 'KAZA', 'Kazakhstan', 'Kazakhstan'),
(119, 'KE', 'KNYA', 'Kenya', 'Kenya'),
(120, 'KG', 'KIRG', 'Kirghizistan', 'Kyrgyzstan'),
(121, 'KI', 'KIRI', 'Kiribati', 'Kiribati'),
(122, 'KW', 'KWEI', 'Koweït', 'Kuwait'),
(123, 'LA', 'LAOS', 'Laos', 'Lao People s Democratic Republic'),
(124, 'LS', 'LESO', 'Lesotho', 'Lesotho'),
(125, 'LV', 'LETT', 'Lettonie', 'Latvia'),
(126, 'LB', 'LIBA', 'Liban', 'Lebanon'),
(127, 'LR', 'LIBE', 'Liberia', 'Liberia'),
(128, 'LY', 'LIBY', 'Libye', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'LIEC', 'Liechtenstein', 'Liechtenstein'),
(130, 'LT', 'LITU', 'Lituanie', 'Lithuania'),
(131, 'LU', 'LUXE', 'Luxembourg', 'Luxembourg'),
(132, 'MO', 'MACA', 'Macao', 'Macao, (China)'),
(133, 'MG', 'MADA', 'Madagascar', 'Madagascar'),
(134, 'MY', 'MALA', 'Malaisie', 'Malaysia'),
(135, 'MW', 'MALW', 'Malawi', 'Malawi'),
(136, 'MV', 'MALD', 'Maldives', 'Maldives'),
(137, 'ML', 'MALI', 'Mali', 'Mali'),
(138, 'MT', 'MALT', 'Malte', 'Malta'),
(139, 'MP', 'MARI', 'Mariannes du Nord', 'Northern Mariana Islands'),
(140, 'MA', 'MARO', 'Maroc', 'Morocco'),
(141, 'MQ', 'MART', 'Martinique', 'Martinique'),
(142, 'MU', 'MAUC', 'Maurice', 'Mauritius'),
(143, 'MR', 'MAUR', 'Mauritanie', 'Mauritania'),
(144, 'YT', 'MAYO', 'Mayotte', 'Mayotte'),
(145, 'MX', 'MEXI', 'Mexique', 'Mexico'),
(146, 'FM', 'MICR', 'Micronésie', 'Micronesia, Federated States of'),
(147, 'MD', 'MOLD', 'Moldavie', 'Moldova, Republic of'),
(148, 'MC', 'MONA', 'Monaco', 'Monaco'),
(149, 'MN', 'MONG', 'Mongolie', 'Mongolia'),
(150, 'MS', 'MONS', 'Montserrat', 'Montserrat'),
(151, 'MZ', 'MOZA', 'Mozambique', 'Mozambique'),
(152, 'NP', 'NEPA', 'Népal', 'Nepal'),
(153, 'NA', 'NAMI', 'Namibie', 'Namibia'),
(154, 'NR', 'NAUR', 'Nauru', 'Nauru'),
(155, 'NI', 'NICA', 'Nicaragua', 'Nicaragua'),
(156, 'NE', 'NIGE', 'Niger', 'Niger'),
(157, 'NG', 'NIGA', 'Nigeria', 'Nigeria'),
(158, 'NU', 'NIOU', 'Nioué', 'Niue'),
(159, 'NO', 'NORV', 'Norvège', 'Norway'),
(160, 'NC', 'NOUC', 'Nouvelle-Calédonie', 'New Caledonia'),
(161, 'NZ', 'NOUZ', 'Nouvelle-Zélande', 'New Zealand'),
(162, 'OM', 'OMAN', 'Oman', 'Oman'),
(163, 'UG', 'OUGA', 'Ouganda', 'Uganda'),
(164, 'UZ', 'OUZE', 'Ouzbékistan', 'Uzbekistan'),
(165, 'PE', 'PERO', 'Pérou', 'Peru'),
(166, 'PK', 'PAKI', 'Pakistan', 'Pakistan'),
(167, 'PA', 'PANA', 'Panama', 'Panama'),
(168, 'PG', 'PAPU', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
(169, 'PY', 'PARA', 'Paraguay', 'Paraguay'),
(170, 'NL', 'PBAS', 'pays-Bas', 'Netherlands'),
(171, 'PH', 'PHIL', 'Philippines', 'Philippines'),
(172, 'PL', 'POLO', 'Pologne', 'Poland'),
(173, 'PF', 'POLY', 'Polynésie française', 'French Polynesia'),
(174, 'PR', 'RICO', 'Porto Rico', 'Puerto Rico'),
(175, 'PT', 'PORT', 'Portugal', 'Portugal'),
(176, 'QA', 'QATA', 'Qatar', 'Qatar'),
(177, 'CF', 'CAFR', 'République centrafricaine', 'Central African Republic'),
(178, 'CD', 'CONG', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
(179, 'DO', 'DOMI', 'République dominicaine', 'Dominican Republic'),
(180, 'CZ', 'TCHE', 'République tchèque', 'Czech Republic'),
(181, 'RE', 'REUN', 'Réunion', 'Reunion'),
(182, 'RO', 'ROUM', 'Roumanie', 'Romania'),
(183, 'GB', 'MIQU', 'Royaume-Uni', 'Saint Pierre and Miquelon'),
(184, 'RU', 'RUSS', 'Russie', 'Russia (Russian Federation)'),
(185, 'RW', 'RWAN', 'Rwanda', 'Rwanda'),
(186, 'SN', 'SENE', 'Sénégal', 'Senegal'),
(187, 'EH', 'SAHA', 'Sahara occidental', 'Western Sahara'),
(188, 'KN', 'NIEV', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
(189, 'SM', 'SMAR', 'Saint-Marin', 'San Marino'),
(190, 'PM', 'SPIE', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
(191, 'VA', 'SSIE', 'Saint-Siège ', 'Vatican City State (Holy See)'),
(192, 'VC', 'SVIN', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
(193, 'SH', 'SLN_', 'Sainte-Hélène', 'Saint Helena'),
(194, 'LC', 'SLUC', 'Sainte-Lucie', 'Saint Lucia'),
(195, 'SV', 'SALV', 'Salvador', 'El Salvador'),
(196, 'WS', 'SAMO', 'Samoa', 'Samoa'),
(197, 'AS', 'SAMA', 'Samoa américaines', 'American Samoa'),
(198, 'ST', 'TOME', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
(199, 'SC', 'SEYC', 'Seychelles', 'Seychelles'),
(200, 'SL', 'LEON', 'Sierra Leone', 'Sierra Leone'),
(201, 'SG', 'SING', 'Singapour', 'Singapore'),
(202, 'SI', 'SLOV', 'Slovénie', 'Slovenia'),
(203, 'SK', 'SLOQ', 'Slovaquie', 'Slovakia'),
(204, 'SO', 'SOMA', 'Somalie', 'Somalia'),
(205, 'SD', 'SOUD', 'Soudan', 'Sudan'),
(206, 'LK', 'SRIL', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
(207, 'SE', 'SUED', 'Suède', 'Sweden'),
(208, 'CH', 'SUIS', 'Suisse', 'Switzerland'),
(209, 'SR', 'SURI', 'Suriname', 'Suriname'),
(210, 'SZ', 'SWAZ', 'Swaziland', 'Swaziland'),
(211, 'SY', 'SYRI', 'Syrie', 'Syrian Arab Republic'),
(212, 'TW', 'TAIW', 'Taïwan', 'Taiwan'),
(213, 'TJ', 'TADJ', 'Tadjikistan', 'Tajikistan'),
(214, 'TZ', 'TANZ', 'Tanzanie', 'Tanzania, United Republic of'),
(215, 'TD', 'TCHA', 'Tchad', 'Chad'),
(216, 'TF', 'TERR', 'Terres australes françaises', 'French Southern Territories - TF'),
(217, 'IO', 'BOIN', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
(218, 'TH', 'THAI', 'Thaïlande', 'Thailand'),
(219, 'TL', 'TIMO', 'Timor Oriental', 'Timor-Leste (East Timor)'),
(220, 'TG', 'TOGO', 'Togo', 'Togo'),
(221, 'TK', 'TOKE', 'Tokélaou', 'Tokelau'),
(222, 'TO', 'TONG', 'Tonga', 'Tonga'),
(223, 'TT', 'TOBA', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
(224, 'TN', 'TUNI', 'Tunisie', 'Tunisia'),
(225, 'TM', 'TURK', 'Turkménistan', 'Turkmenistan'),
(226, 'TR', 'TURQ', 'Turquie', 'Turkey'),
(227, 'TV', 'TUVA', 'Tuvalu', 'Tuvalu'),
(228, 'UA', 'UKRA', 'Ukraine', 'Ukraine'),
(229, 'UY', 'URUG', 'Uruguay', 'Uruguay'),
(230, 'VU', 'VANU', 'Vanuatu', 'Vanuatu'),
(231, 'VE', 'VENE', 'Venezuela', 'Venezuela'),
(232, 'VN', 'VIET', 'Viêt Nam', 'Viet Nam'),
(233, 'WF', 'WALI', 'Wallis-et-Futuna', 'Wallis and Futuna'),
(234, 'YE', 'YEME', 'Yémen', 'Yemen'),
(235, 'YU', 'YOUG', 'Yougoslavie', 'Saint Pierre and Miquelon'),
(236, 'ZM', 'ZAMB', 'Zambie', 'Zambia'),
(237, 'ZW', 'ZIMB', 'Zimbabwe', 'Zimbabwe'),
(238, 'MK', 'MACE', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR');

-- --------------------------------------------------------

--
-- Table structure for table `thematique`
--

CREATE TABLE IF NOT EXISTS `thematique` (
  `NumThem` char(8) NOT NULL,
  `LibThem` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumThem`),
  KEY `THEMATIQUE_FK` (`NumThem`),
  KEY `FK_ASSOCIATION_4` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thematique`
--

INSERT INTO `thematique` (`NumThem`, `LibThem`, `NumLang`) VALUES
('THE0101', 'L''événement', 'FRAN01'),
('THE0102', 'L''acteur-clé', 'FRAN01'),
('THE0103', 'Le mouvement émergeant', 'FRAN01'),
('THE0104', 'L''insolite / le clin d''oeil', 'FRAN01'),
('THE0201', 'The event', 'ANGL01'),
('THE0202', 'The key player', 'ANGL01'),
('THE0203', 'The emerging movement', 'ANGL01'),
('THE0204', 'The unusual / the wink', 'ANGL01'),
('THE0301', 'Die Veranstaltung', 'ALLE01'),
('THE0302', 'Der Schlüsselakteur', 'ALLE01'),
('THE0303', 'Die entstehende Bewegung', 'ALLE01'),
('THE0304', 'Das Ungewöhnliche / das Augenzwinkern', 'ALLE01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Login` char(30) NOT NULL,
  `Pass` char(15) NOT NULL,
  `LastName` char(30) DEFAULT NULL,
  `FirstName` char(30) DEFAULT NULL,
  `EMail` char(50) NOT NULL,
  PRIMARY KEY (`Login`,`Pass`),
  KEY `USER_FK` (`Login`,`Pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Login`, `Pass`, `LastName`, `FirstName`, `EMail`) VALUES
('BarbieS9', 'P9#7xL', 'La Rousse', 'Julie', 'titou@gmail.com'),
('Chris45', 'Ut!D5?h0', 'Dupont', 'Jean', 'cricri@srf.fr'),
('Cruella', 'qL:5R!1', 'Mercury', 'Freddy', 'Cruella@free.fr'),
('Mama', '1234', 'RABOUAN', 'Maëlle', 'maelle.rabouan@gmail.com'),
('PitouF', 'G0_f2;A', 'Durand', 'Joe', 'JoeStarr@free.fr');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angle`
--
ALTER TABLE `angle`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`NumAngl`) REFERENCES `angle` (`NumAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`NumThem`) REFERENCES `thematique` (`NumThem`),
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`);

--
-- Constraints for table `motcle`
--
ALTER TABLE `motcle`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

--
-- Constraints for table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`NumMoCle`) REFERENCES `motcle` (`NumMoCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`);

--
-- Constraints for table `thematique`
--
ALTER TABLE `thematique`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
