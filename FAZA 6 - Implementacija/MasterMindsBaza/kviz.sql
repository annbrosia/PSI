-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 01:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kviz`
--
CREATE DATABASE IF NOT EXISTS `kviz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kviz`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idKA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idKA`) VALUES
(35);

-- --------------------------------------------------------

--
-- Table structure for table `igrac`
--

CREATE TABLE `igrac` (
  `idKI` int(11) NOT NULL,
  `ime` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `prezime` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `poeni` int(11) DEFAULT NULL,
  `poeniTrenutni` int(11) DEFAULT NULL,
  `blokirani` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `igrac`
--

INSERT INTO `igrac` (`idKI`, `ime`, `prezime`, `email`, `poeni`, `poeniTrenutni`, `blokirani`) VALUES
(8, 'Mila', 'Milic', 'mila@gmail.com', 6, 0, 0),
(12, 'Milena', 'Milenic', 'milenica@gmail.com', 0, 1, 0),
(13, 'Milos', 'Milosic', 'milosmilos123@gmail.com', 0, 1, 0),
(14, 'Ivo', 'Ivic', 'ivoivomalicar123@gmail.com', 0, 1, 1),
(15, 'Ruzica', 'Ruzic', 'ruza123@gmail.com', 0, 1, 1),
(16, 'Stefan', 'Stefanovic', 'stefanbadboy123@gmail.com', 0, 1, 1),
(17, 'Masa', 'Masic', 'masa123@gmail.com', 0, 1, 0),
(18, 'Teodora', 'Teodoric', 'tealookinggood@gmail.com', 0, 1, 0),
(19, 'Rozalinda', 'Rozalindic', 'rozalindaroza1@gmail.com', 0, 1, 0),
(20, 'Dusan', 'Dusanovic', 'dusandule123@gmail.com', 0, 1, 0),
(21, 'Andjela', 'Andjelic', 'andjelaandjelic@gmail.com', 0, 1, 0),
(22, 'Jelena', 'Jelenic', 'jeckapecka1@gmail.com', 0, 1, 1),
(23, 'Marijana', 'Marijanovic', 'marijanamarijana131@gmail.com', 0, 1, 0),
(24, 'Isidora', 'Isidoric', 'isidoraisidoric@gmail.com', 0, 1, 0),
(30, 'Email', 'Emailic', 'marijalalic@hotmail.rs', 0, 1, 1),
(34, 'Martina', 'Markovic', 'martinamarkovic998@gmail.com', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorije` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorije`, `naziv`) VALUES
(1, 'serije'),
(2, 'muzika'),
(3, 'geografija'),
(4, 'prirodne nauke'),
(5, 'filmovi'),
(6, 'sport'),
(7, 'istorija'),
(8, 'biologija'),
(9, 'umetnost');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idKomentara` int(11) NOT NULL,
  `tekstKomentara` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `idKKom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idKomentara`, `tekstKomentara`, `idKKom`) VALUES
(1, 'Super je sajt. Bas kida ono bas! Loodilo! Poz', 8),
(2, 'Jos jednom da kažem kako kida! Vrh!', 8),
(3, 'Znači kida.', 8),
(4, 'Smatram da Vas sajt sadrzi previse ljubicaste', 14),
(5, 'Im so fucking tired. ', 30),
(6, 'Pozdrav za administratora. Cmok! ', 8);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnika` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `uloga` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `aktivan` int(11) NOT NULL,
  `obrisan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnika`, `username`, `password`, `uloga`, `aktivan`, `obrisan`) VALUES
(1, 'maki98', 'myysql', 'moderator', 1, 0),
(2, 'saleno1', 'workwork', 'moderator', 0, 0),
(3, 'lola1', '123lola', 'moderator', 0, 0),
(4, 'uki', 'uki123', 'moderator', 0, 0),
(5, 'daki', 'daki123', 'moderator', 0, 0),
(6, 'sale', 'sale123', 'moderator', 0, 0),
(7, 'tasa', 'tasa123', 'moderator', 0, 0),
(8, 'mila', 'mila123', 'igrac', 1, 0),
(9, 'ksenci', 'ksenci123', 'moderator', 0, 0),
(10, 'strahinja_junior', 'strahinja123', 'moderator', 0, 0),
(11, 'najo', 'sekspir', 'moderator', 0, 0),
(12, 'kraljica_neba', '123456', 'igrac', 0, 0),
(13, 'mito_bekrija3', '123456', 'igrac', 0, 0),
(14, 'smartest_one1', '123456', 'igrac', 0, 0),
(15, 'supa_bistra213', '123456', 'igrac', 0, 0),
(16, 'stefo11', '123456', 'igrac', 0, 0),
(17, 'sundjer_bob232', '123456', 'igrac', 0, 0),
(18, 'cici22', '123456', 'igrac', 0, 0),
(19, 'dinosaurus21', '123456', 'igrac', 0, 0),
(20, 'dule_232', '123456', 'igrac', 0, 0),
(21, 'dijamant_margarin232', '123456', 'igrac', 0, 0),
(22, 'jk_diva123', '123456', 'igrac', 0, 1),
(23, 'zrela_lubenica', '123456', 'igrac', 0, 0),
(24, 'isidora11', '123456', 'igrac', 0, 0),
(25, 'miroslav232', '123456', 'moderator', 0, 0),
(26, 'mira232', '123456', 'moderator', 0, 0),
(27, 'milosmiki23123', '123456', 'moderator', 0, 0),
(28, 'mitarmitro23', '123456', 'moderator', 0, 0),
(29, 'goks23goks', '123456', 'moderator', 0, 0),
(30, 'email_test123', '123456', 'igrac', 0, 0),
(31, 'dzoni111', '123456', 'moderator', 0, 1),
(34, 'marti', 'ajica', 'igrac', 0, 0),
(35, 'admin', 'admin123', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `idKM` int(11) NOT NULL,
  `idKatMod` int(11) NOT NULL,
  `biografija` varchar(256) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ime` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `prezime` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`idKM`, `idKatMod`, `biografija`, `email`, `ime`, `prezime`) VALUES
(1, 2, 'Profesor solfedja u srednjoj muzickoj skoli Stevan Mokranjac u Bajinoj Basti.', 'maki98@gmail.com', 'Marko', 'Markovic'),
(2, 1, 'Veliki poznavalac serija. Trenutno prevodim epizode na jednom internet sajtu.', 'saleprevodilac@gmail.com', 'Sasa', 'Sasic'),
(3, 3, 'Nastavnik geografije u osnovnoj skoli Sveti Sava u Zrenjaninu. Veliki ljubitelj kvizova.', 'lolola@gmail.com', 'Lola', 'Lolic'),
(4, 4, 'Nastavnik matematike u srednjoj skoli Gimnazija Krusevac.', 'uros@gmail.com', 'Uros', 'Markovic'),
(5, 5, 'Pobednik mnogih kvizova o filmovima.Profesor na Fakultetu dramskih umetnosti u Beogradu.', 'damir.pekic@gmail.com', 'Damir', 'Pekic'),
(6, 6, 'Profesor na DIF-u. Sportski analiticar, ucesnik u brojnim sportskim emisijama.', 'sasa@gmail.com', 'Sasa', 'Mandic'),
(7, 7, 'Profesorka istorije u srednjoj skoli.Dugogodisnja ucesnica kviza Slagalica.', 'anastasija@gmail.com', 'Anastasija', 'Antic'),
(9, 8, 'Zavrsila medicinski fakultet Univerziteta u Beogradu. Trenutno radim na projektu Otkrivanje vakcine protiv korone.', 'ksenci.princess1974@gmail.com', 'Ksenija', 'Ksenic'),
(10, 9, 'Profesor umjetnosti u Opstoj gimnaziji. Naslikao sam nekoliko radova koji su primili pozitivne kritike: Cvijet u kosi i Plavetnilo.', 'strahinjastrasni@gmail.com', 'Strahinja', 'Strahinjic'),
(25, 8, 'He my polite be object oh change. Consider no mr am overcame yourself throwing sociable children. Hastily her totally conduct may. My solid by stuff first smile fanny. Humoured how advanced mrs elegance sir who. Home sons when them dine do want to.Improved', 'miric123456c@gmail.com', 'Miroslav', 'Miric'),
(26, 9, 'He my polite be object oh change. Consider no mr am overcame yourself throwing sociable children. Hastily her totally conduct may. My solid by stuff first smile fanny. Humoured how advanced mrs elegance sir who. Home sons when them dine do want to. Estimat', 'miranovicmira@gmail.com', 'Mira', 'Miranovic'),
(27, 2, 'Home sons when them dine do want to.', 'milosecr@gmail.com', 'Milos', 'Milosevic'),
(28, 4, 'In up so discovery my middleton eagerness dejection explained. Estimating excellence ye contrasted insensible as. Oh up unsatiable advantages decisively as at interested. Present suppose in esteems in demesne colonel it to. End horrible she landlord screen', 'mitarcarmitar@gmail.com', 'Mitar', 'Mitrovic'),
(29, 9, 'Home sons when them dine do want to.', 'goksgoks@gmail.com', 'Gordana', 'Gordic'),
(31, 9, 'Imam 22 godine. Veliki obozavalac umjetnosti. Zavrsio faukultet. ', 'nikolica@gmail.com', 'Nikolica', 'Prikolica');

-- --------------------------------------------------------

--
-- Table structure for table `motivacionaporuka`
--

CREATE TABLE `motivacionaporuka` (
  `idPoruke` int(11) NOT NULL,
  `tekst` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `motivacionaporuka`
--

INSERT INTO `motivacionaporuka` (`idPoruke`, `tekst`) VALUES
(1, 'Što više znaš, više vrediš.'),
(2, 'Nema većega mraka od neznanja.'),
(3, 'Uči dobre stvari, loše se uče same od sebe.'),
(4, 'Lažno je znanje štetnije od neznanja.'),
(5, 'Bolje je naučiti nepotrebno, nego ništa.');

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

CREATE TABLE `pitanje` (
  `idPitanja` int(11) NOT NULL,
  `tekstPitanja` varchar(256) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tacan` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `netacan1` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `netacan2` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `netacan3` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `idKP` int(11) NOT NULL,
  `idKat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`idPitanja`, `tekstPitanja`, `tacan`, `netacan1`, `netacan2`, `netacan3`, `idKP`, `idKat`) VALUES
(1, 'Ko je vladar Vesterosa na kraju serije?', 'Bran Stark ', 'Daenerys Targaryen', 'Cersei Lannister', 'Jon Snow', 2, 1),
(2, 'Kako se zove plišani najbolji prijatelj Mr.Beana?', 'Teddy', 'Bear', 'TED', 'Mister', 2, 1),
(3, 'Radnja koje serije se odvija u budućnosti, nakon Drugog američkog građanskog rata, u kojoj su žene prisiljene na seksualno i porođajno ropstvo:\r\n', 'Sluškinjina priča', 'Futurama', 'Black Mirror', 'Sex and the city', 2, 1),
(4, 'U prvoj epizodi prve sezone ko slučajno sazna tajnu kraljice Cersei? \r\n', 'Bran Stark', 'Gilly', 'Sansa Stark', 'Arya Stark', 2, 1),
(5, 'Kako se zove ulica u kojoj živi Sherlock Holmes? ', '221 Baker Street', '742 Evergreen Terrace', '245 East 73rd Street', '1882 Gerard Street', 2, 1),
(6, 'Koliko je sveukupno doktora u Dr.Who serijalu', '13', '12', '7', '14', 2, 1),
(7, 'Doktor House ima ovisnost o kojim tabletama?', 'Vikodin', 'Aspirin', 'Paracetamol', 'Caffetin', 2, 1),
(8, 'Kako se zove kafić u kojem svaki dan Prijatelji piju kafu?', 'Central Perk', 'Insomnia Cafe', 'Rays Cafe', 'Friends cafe', 2, 1),
(9, 'Kako se zove žena koja je stekla status potencijalne ljubavi Sherlocka Holmesa:', 'Irene Adler', 'Mrs. Hudson', 'Molly Hooper', 'Mary Watson', 2, 1),
(10, 'The Simpsons serija ima više od:', '600 epizoda', '700 epizoda', '800 epizoda', '900 epizoda', 2, 1),
(11, 'Prijatelj Sherlock Holmesa je:', 'Dr John Watson', 'Mycroft', 'Dr Who', 'Dr House', 2, 1),
(12, 'Kako se zovu decaci iz serije Stranger Things:', 'Mike,Dustin,Lucas & Will', 'Finn,Will,Lucas', 'Will, Jacob,Caleb & Logan', 'Joe,Finn & Mark', 2, 1),
(13, 'Serija u kojoj glumci nose maske Salvadora Dalija i crvene kombinezone:', 'La casa de papel', 'The Handmaids Tale', ' Black Mirror', 'Friends', 2, 1),
(14, 'Serija koja prikazuje razvoj tehnologije i naše zavisnosti od nje kroz mračnu i opominjuću viziju budućnosti:', 'Black Mirror', 'The Handmaids Tale', 'Breaking Bad', 'Stranger Things', 2, 1),
(15, 'Serija čija priča prati profesora hemije koji, usled teške bolesti, postaje nezaustavljivi proizvođač plave droge metamfetamina i zastrašujući narko bos:', 'Breaking bad', 'Narcos', 'Black Mirror', 'Stranger Things', 2, 1),
(16, 'Ulica Topolska 18 poznata po seriji:', 'Srecni ljudi', 'Bolji zivot', 'Igra sudbine', 'Istine i lazi', 2, 1),
(17, 'Gradić Twin Peaks potresla je smrt mlade djevojke po imenu', 'Laura Palmer', 'Shelly Johnson', 'Donna Hayward', 'Audrey Horne', 2, 1),
(18, 'Serija u kojoj su glavni likovi iz porodice Popadic je: ', 'Bolji zivot', 'Porodicno blago', 'Policajac sa Petlovog Brda', 'Otvorena vrata', 2, 1),
(19, 'Kako se zove Rossov majmunčić u seriji Friends?', 'Marcel', 'Bobo', 'Miquel', 'Bubbles', 2, 1),
(20, 'Serija u kojoj likovi nose imena gradova:', ' La casa de papel', 'Black Mirror ', 'Breaking Bad', 'Stranger Things', 2, 1),
(21, 'Džez je muzički pravac koji nastaje u?', 'Severnoj Americi', 'Africi', 'Juznoj Americi', 'Aziji', 1, 2),
(22, 'Umro je u 35-oj godini, ostavivši nedovršeno jedno od svojih najboljih dela - Rekvijum. Ko je to?\r\n', 'Volfgang Amadeus Mocart', 'Johan Sebastijan Bah', ' Johanes Brams', 'Ludvig van Betoven', 1, 2),
(23, 'Svoje najpoznatije delo, oratorijum \"Mesija\", napisao je za samo 24 dana. O kome je reč?\r\n', 'Georg Fridrih Hendl', 'Franc List', 'Frederik Šopen', 'Žorž Bize', 1, 2),
(24, '\"Ohridska legenda\" je delo kog kompozitora:', 'Stevan Hristic ', 'Stevan Stojanovic Mokranjac', 'Trajko Prokopiev', 'Johanes Brams', 1, 2),
(25, 'Ko je komponovao Odu radosti?', 'Ludvig van Betoven ', 'Jozef Hajdn', 'Hektor Berlioz', 'Petar Iljič Čajkovski', 1, 2),
(26, 'Četiri godišnja doba komponovao je:', 'Vivaldi', 'Mozart', 'Straus', 'Schopen', 1, 2),
(27, 'Poznati srpski kompozitor je:', 'Stevan Hristic ', 'Borisav Stankovic', 'Stevan Sremac', 'Nadezda Petrovic', 1, 2),
(28, '\"Rukoveti\" je najpoznatije delo:', 'Stevana Stojanovica Mokranjca ', 'Miloja Milojevica', 'Petra Konjovica', 'Stevana Hristica', 1, 2),
(29, 'Muziku za Labudovo jezero je napisao:', 'Petar Iljič Čajkovski', 'Jozef Hajdn', 'Franc Schubert', 'Hektor Berlioz', 1, 2),
(30, 'Mađarske igre je delo kog kompozitora?', 'Johanes Brams', 'Johan Sebastijan Bach', 'Stevan Hristic', 'Jozef Hajdn', 1, 2),
(31, 'Koliko je Betovenovih opera izvedeno:', 'jedna', 'pet', 'sedam', 'devet', 1, 2),
(32, 'BAS ključ u muzici, označava mesto note:\r\n', 'F', 'G', 'H', 'D', 1, 2),
(33, 'Ko je bio odličan pijanista, sve dok nije uništo svoju šaku mehanizmom koji je trebalo da mu pomogne u sviranju?', 'Robert Šuman', 'Johanes Brams', 'Franc List', 'Frederik Šopen', 1, 2),
(34, 'Rođen je kao Aleksandar Cezar Leopold ali je kasnije promenio ime:', 'Žorž Bize', 'Franc List', 'Klod Debisi', 'Žil Masne', 1, 2),
(35, 'Najpoznatiji kompozitor baroka je:', 'Johan Sebastijan Bah', 'Antonio Vivaldi', 'Georg Filip Teleman', 'Jozef Hajdn', 1, 2),
(36, 'Jedini je kompozitor koji je nastavio da komponuje i posle gubitka sluha. Ko je to?', 'Ludvig van Betoven', 'Domeniko Skarlati', 'Antonio Vivaldi', 'Jozef Hajdn', 1, 2),
(37, 'Koji poznati kompozitor i pijanista, javno je nastupio samo jednom u životu.', 'Johanes Brams', 'Franc List', 'Franc Schubert', 'Klod Debisi', 1, 2),
(38, 'Ovaj poznati reformator opere napisao je operu koja traje 22 sata, za čije izvođenje je morao da sagradi posebnu opersku kuću.O kome je reč?', 'Rihard Vagner', 'Petar Iljič Čajkovski', 'Gustav Maler', 'Đuzepe Verdi', 1, 2),
(39, 'Ko je autor simfonije \"Vltava\"?', 'Smetana', 'Dvorak', 'Rossini', 'Schubert', 1, 2),
(40, 'Autor \"Mesečeve sonate\" je?', 'Beethoven', 'Mozart', 'Bach', 'Vivaldi', 1, 2),
(41, 'Koja je najduža rijeka na svijetu?', 'Nil', 'Jangcekjang', 'Amazon', 'Misisipi', 3, 3),
(42, 'Rijeka koja protiče kroz Pariz je poznata kao?\r\n', 'Sena', 'Temza', 'Loire', 'Rajna', 3, 3),
(43, 'Koji je najveći grad na svijetu po broju stanovnika?\r\n', 'Sangaj', 'Tokio', 'Peking', 'Istanbul', 3, 3),
(44, 'Koji od ovih kontinenata je najveći po površini?', 'Azija', 'Sjeverna Amerika', 'Afrika', 'Juzna Amerika', 3, 3),
(45, 'Koji je najduži planinski vijenac na svijetu?', 'Ande', 'Himalaji', 'Stjenjak', 'Transantarktičke planine', 3, 3),
(46, 'Najveći dinosaurus na zemlji hodao je:', 'Argentinom', 'Španijom', 'Kinom', 'Mongolijom', 3, 3),
(47, 'Najviši vodopadi na svetu su \"Anđeoski vodopadi\". Oni se nalaze u:\r\n', 'Venecueli', 'Kanadi', 'Brazilu', 'SADu', 3, 3),
(48, 'Koja je najsevernija prestonica na kopnu Evrope?', 'Helsinki', 'Oslo', 'Stokholm', 'Moskva', 3, 3),
(49, 'Koja je najmnogoljudnija država na svijetu?', 'Kina', 'SAD', 'Indija', 'Meksiko', 3, 3),
(50, 'Koja od ovih država nije ostrvo?', 'Irska', 'Novi Zeland', 'Svajcarska', 'UK', 3, 3),
(51, 'Koji je glavni grad Islanda?', 'Reykjavik', 'Keflavik', 'Akureyri', 'Vatnajokull', 3, 3),
(52, 'Grinič prolazi kroz koji engleski grad?', 'London', 'Oxford', 'Liverpool', 'Brighton', 3, 3),
(53, 'Koja je najmanja država na svijetu?', 'Vatikan', 'Gibraltar', 'Kajmanska ostrva', 'Americka samoa', 3, 3),
(54, 'Koja država ima neverovatnu stopu pismenosti od 99,8?', 'Kuba', 'SAD', 'Spanija', 'Rusina', 3, 3),
(55, 'Kako se zove najsuvlja pustinja na svetu?', 'Atakama', 'Sahara', 'Gobi', 'Mohave', 3, 3),
(56, 'Gde se nalazi najduža ulica na svetu?', 'Kanada', 'SAD', 'Kina', 'Rusija', 3, 3),
(57, 'Koliko zvezdica ima na zastavi SAD?', '50', '56', '52', '54', 3, 3),
(58, 'Koliko ima kontinenata?', '7', '6', '8', '5', 3, 3),
(59, 'Koja država nije kraljevina?', 'Svajcarska', 'Svedska', 'Spanija', 'Danska', 3, 3),
(60, 'Koja država ima oblik štapa?', 'Cile', 'Italija', 'Mongolija', 'Bolivija', 3, 3),
(61, 'Otac helenske matematike je:', 'Tales', 'Pitagora', 'Euklid', 'Eratosten', 4, 4),
(62, 'Ko je napisao poznato delo Geometrija, koje je postavilo osnove danasnjoj analitickoj geometrijji?', 'Rene Dekart', 'Gaus', 'Eratosten', 'Euklid', 4, 4),
(63, 'U algebarskoj geometriji, ova teorema tvrdi da je broj mogucih presecnih tacaka dve ravanske algebarske krive jednak proizvodu njihovih stepena.\n O kojoj teoremi je rec?', 'Bezuova teorema', 'Binomna teorema', 'Bor-Molererupova teorema', 'Berova teorema', 4, 4),
(64, 'Kod pravouglog trougla gde su a i b katete,a c je hipotenuza,vazi teorema da je zbir kvadrata kateta jednak kvadratu hipotenuze. Kako se zove ova teorema?', 'Pitagorina', 'Lagranzova', 'Fermaova', 'Kosinusna', 4, 4),
(65, 'Broj PI je priblizno jednak:', '3.14', '1.6', '2.8', '3.20', 4, 4),
(66, 'Ako je hipotenuza kod pravouglog trougla jednaka 10cm, a jedna kateta je 6cm,koja je duzina druge katete?', '8cm', '4', '-12', '-5', 4, 4),
(67, 'Koliko ivica ima kocka?', '12', '4', '6', '8', 4, 4),
(68, 'Koliki je obim kruga poluprecnika 3cm?', '6Pi cm', '3Pi cm', '9Pi cm', '12Pi cm', 4, 4),
(69, 'Kolika je povrsina kruga poluprecnika 3cm?', '9Pi cm2', '6Pi cm2', '12Pi cm2', '3Pi cm2', 4, 4),
(70, 'Koji je hemijski element, izuzetno bitan za razvoj inteligencije, iz pepela morskih algi \nprvi izolovao hemičar Bernard Kurtoa 1811. godine?', 'jod', 'kalijum', 'fosfor', 'kalcijum', 4, 4),
(71, 'Koji je nemački hemičar, pionir agrohemije, u 19. veku došao do saznanja da biljke upijaju važne neorganske hranljive materije u obliku soli,\n čime je otkrio veštačko đubrivo?', 'Justus fon Libig', 'Fridrih Kekule', 'Oto Han', 'Adolf fon Bajer', 4, 4),
(72, 'Mnogi hemijski elementi nazvani su po mestima u kojima su otkriveni, ali maleno selo Iterbi „kumovalo” je imenima čak četiri hemijska elementa: itrijum, erebijum, terbijum i iterbijum.\n U kojoj državi se nalazi to selo?', 'u Svedskoj', 'u Nemackoj', 'u Poljskoj', 'u Rusiji', 4, 4),
(73, 'Koji metal je dobio ime po nemačkoj reči za gobline ili zle duhove iz rudnika,\n za koje se verovalo da su uzrok iznenadnih i misterioznih smrti rudara?', 'kobalt', 'olovo', 'bakar', 'titanijum', 4, 4),
(74, 'Kako se u hemiji nazivaju atomi, molekuli ili joni koji imaju neuparen elektron u spoljašnjoj elektronskoj ljusci?', 'slobodni radikali', 'katjoni', 'anjoni', 'izotopi', 4, 4),
(75, 'Koji hemijski element je sasvim slučajno otkrio nemački hemičar Hening Brand, pokušavajući da\n destilacijom sopstvene mokraće dobije zlato?', 'fosfor', 'kalijum', 'natrijum', 'kalcijum', 4, 4),
(76, 'Koji je organski polimer odgovoran što novinski papir vremenom požuti?', 'lignin', 'celuloza', 'skrob', 'proteini', 4, 4),
(77, 'Koje jedinjenje je po hemijskom sastavu puževa kućica?', 'kalcijum-karbonat', 'kalcijum-oksid', 'kalcijum-sulfat', 'kalcijum-bikarbonat', 4, 4),
(78, 'Koja koncentrovana kiselina se krije iza starog imena vitriolovo ulje ili vitriol, a danas se najčešće dobija kontaktnim postupkom?', 'sumporna kiselina', 'hlorovodonicna kiselina', 'azotna kiselina', 'sumporasta kiselina', 4, 4),
(79, 'Hemijski element americijum ime je dobio po Americi, francijum po Francuskoj, a germanijum po Nemačkoj. Koji hemijski element duguje svoje ime latinskom nazivu za srednjovekovnu Rusiju?', 'rutenijum', 'rodijum', 'renijum', 'proteini', 4, 4),
(80, 'Telo od 50kg u svemiru ima tezinu priblizno:', '0N', '500N', '50N', '5N', 4, 4),
(81, 'Ko glumi duha u modernoj verziji Aladina?', 'Will Smith', 'Matt Damon', 'Tom Hanks', 'Leonardo DiCaprio', 5, 5),
(82, 'Koliko delova ima film Sam u kuci?', '5', '4', '3', '2', 5, 5),
(83, 'U kojem vampirskom filmu je glumio Hugh Jackman?', 'Van Helsing', 'The lost boys', '30 days of night', 'From dusk till dawn', 5, 5),
(84, 'Koji je od ovih filmova osvojio NAJMANJE Oscara?', 'Gone with the wind', 'The lord of the Rings', 'Titanic', 'Ben-Hur', 5, 5),
(85, 'Kako se zove kraljevstvo u kojem se film Frozen odvija?', 'Arendelle', 'Atlantica', 'Asgard', 'Agrabah', 5, 5),
(86, 'Iz kojeg filma je ovaj citat: I believe whatever doesn’t kill you, simply makes you…stranger.', 'The Dark Knight', 'What does not kill you', 'The Strangers', 'Doctor Strange', 5, 5),
(87, 'Tarantinov film s najvećom zaradom je?', 'Django Unchained', 'Once Upon a Time... in Hollywood', 'The Hateful Eight', 'Pulp Fiction', 5, 5),
(88, 'Koju kartašku igru Bond igra u filmu Casino Royale?', 'Poker', 'Rulet', 'Blackjack', 'Belu', 5, 5),
(89, 'U kojem se gradu film Die Hard odvija?', 'Chicago', 'Los Angeles', 'San Francisco', 'New York', 5, 5),
(90, 'Koji je naziv broda Jacka Sparrowa?', 'The Black Pearl', 'The Black Flag', 'The Horizon', 'The Hispaniola', 5, 5),
(91, 'Koji je glumac glumio u ova tri filma - Guardians of the Galaxy, Jurassic World, The Magnificent Seven?', 'Chris Pratt', 'Chris Evans', 'Jeffrey Goldblum', 'Vin Diesel', 5, 5),
(92, 'Koliko je Tomb Raider filmova napravljeno?', '3', '2', '2', '4', 5, 5),
(93, 'Koji je naziva zatvora u filmu The Rock?', 'Alcatraz', 'Devils Island', 'Attica', 'Sing,Sing', 5, 5),
(94, 'Ko je glumio Che Guevaru u filmu \"Evita\"?', 'Antonio Banderas', 'Benicio del Toro', 'Omar Sharif', 'Diego Luna', 5, 5),
(95, 'Ko glumi glavnu zensku ulogu u filmu \"Twilight\"?', 'Kristen Stewart', 'Anna Kendrick', 'Jennifer Lawrence', 'Emma Roberts', 5, 5),
(96, 'Kako se zove lik koji glumi Leonardo Di Caprio u filmu \"Titanik\"?', 'Jack', 'Alex', 'Sam', 'David', 5, 5),
(97, 'U kom filmu glumi Rebel Wilson sa Annom Kendrick?', 'Pitch perfect 2', 'Love and basketball', 'Charmed', 'Pretty little liars', 5, 5),
(98, 'Ko glumi Jokera iz 1989 godine?', 'Jack Nicholson', 'Jared Leto', 'Cesar Romero', 'Brad Pitt', 5, 5),
(99, 'Kako se zove film u kome je glavni lik Jack Sparrow?', 'Pirates of the Caribbean', 'The hobbit', 'Mr Bean', 'The fault in our stars', 5, 5),
(100, 'Film \"The ring\" je kog zanra?', 'horor', 'komedija', 'triler', 'akcija', 5, 5),
(101, 'U kom gradu se nalazi stadion Millenium?', 'Cardiff', 'Bayern', 'Stuttgart', 'Hertha', 6, 6),
(102, 'Koja drzava je bila sampion svetskog prvenstva u fudbalu 2018. godine?', 'Francuska', 'Portugalija', 'Nemacka', 'Italija', 6, 6),
(103, 'Ko je bio pobednik Lige sampiona 1991.godine?', 'Crvena Zvezda', 'Partizan', 'Barselona', 'Valensija', 6, 6),
(104, 'Koje godine je Novak Djokovic osvojio Wibledon i u isto vreme postao svetski broj 1?', '2011', '2010', '2012', '2009', 6, 6),
(105, 'Ko je bio pobednik Dejvis kupa 2011. godine?', 'Spanija', 'Srbija', 'Francuska', 'Rusija', 6, 6),
(106, 'Koja od teniserki je osvojila \"zlatni set\" 2012.godine?', 'Jaroslava Švedova', 'Petra Kvitova', 'Serena Vilijams', 'Simona Halep', 6, 6),
(107, 'Ko je MVP Evropskog prvenstva u odbojci 2017. godine za muskarce?', 'Maksim Mihajlov', 'Uros Kovacevic', 'Aleksandar Atanasijevic', 'Ervin Ngapet', 6, 6),
(108, 'Kog porekla je odbojkas Ivan Zajcev?', 'ruskog', 'italijanskog', 'francuskog', 'nemackog', 6, 6),
(109, 'Ko je bio MVP Evropskog prvenstva u odbojci za zene 2011. godine?', 'Jovana Brakocevic', 'Paola Egonu', 'Tijana Boskovic', 'Jevgenija Starceva', 6, 6),
(110, 'Koja odbojkaska reprezentacija je uspela da u jednoj godini objedini titule prvaka Evrope u obe konkurencije, i to je uradila 2 puta?', 'Srbija', 'Rusija', 'Italija', 'Francuska', 6, 6),
(111, 'Kojim sportom se bavio Momcilo Vukotic?', 'fudbalom', 'sahom', 'vaterpolom', 'odbojkom', 6, 6),
(112, 'Sa kog kontinenta su svi timovi u formuli 1?', 'Evropa', 'Azija', 'Autralija', 'Severna Amerika', 6, 6),
(113, 'Vladimir Klicko je poznati ukrajinski:', 'bokser', 'fudbaler', 'kosarkas', 'teniser', 6, 6),
(114, 'Velimir Stjepanovic je poznati srpski: ', 'plivac', 'vaterpolista', 'rukometas', 'fudbaler', 6, 6),
(115, 'Ko je apsolutni rekorder po broju nastupa na All-Star utakmicama u NBA-u sa cak 19 nastupa?', 'Kareem Abdul-Jabbar', 'Kobe Bryant', 'Michael Jordan', 'Bogdan Bogdanovic', 6, 6),
(116, 'Koji klub je aktuelni prvak NFL-a?', 'New England', 'Arizona Cardinals', 'Seattle Seahawks', 'Indianapolis Colts', 6, 6),
(117, 'Nadja Komaneci je bila sampionka u kom sportu?', 'gimnastici', 'umetnickom klizanju', 'rukometu', 'odbojci', 6, 6),
(118, 'Koji igrac je odigrao najvise utakmica u istoriji lige sampiona?', 'Iker Kasiljas', 'Cristiano Ronaldo', 'Leo Messi', 'Luis Suarez', 6, 6),
(119, 'Ko je kapiten vaterpolo reprezentacije Srbije?', 'Filip Filipovic', 'Andrija Prlainovic', 'Nikola Jaksic', 'Dusan Mandic', 6, 6),
(120, 'Koji je prvi klub Bogdana Bogdanovica?', 'Zitko Basket', 'Partizan', 'FMP', 'Mega Bemax', 6, 6),
(121, 'Izraz manufaktura znači:', 'raditi ručno', 'trgovina', 'zanatska radionica', 'umetnost', 7, 7),
(122, 'Vođa jezuitskog reda \"Društvo Isusovo\" bio je:', 'Injacio Lojola', 'Martin Luter', 'Karlo V', 'Eugen Savojski', 7, 7),
(123, 'Koliko godina je trajao Tridesetogodišnji rat?', '30', '27', '32', '36', 7, 7),
(124, 'Kralj Luj XIII bio je pripadnik dinastije:', 'Burbona', 'Karolinške', 'Karolinške', 'Capet', 7, 7),
(125, 'Telegraf je izumio:', 'Samjuel Morze', 'Robert Fulton', 'Luj Dager', 'Dzejms Vat', 7, 7),
(126, 'Prva knjiga odštampana u Gutenbergovoj mašini bila je:', 'Biblija', 'Sidur', 'Dijamantska sutra', 'Kelasa', 7, 7),
(127, 'Prva zastava SAD-a imala je:', '13 zvezdica', '5 zvezdica', '9 zvezdica', '15 zvezdica', 7, 7),
(128, 'Povod za izbijanje Američke revolucije bio je događaj poznat pod imenom:', 'Bostonska čajanka', 'Engleska čajanka', 'Virdzinijska čajanka', 'Versajska čajanka', 7, 7),
(129, 'Krimski rat započeo je:', '1853', '1856', '1851', '1862', 7, 7),
(130, 'Ko je ubio dahije?', 'Milenko Stojković', 'Aleksa Nenadović', 'Filip Višnjić', 'Karađorđe', 7, 7),
(131, 'Turski ustav donet je:', '1838. godine', '1839. godine', '1833. godine', '1836. godine', 7, 7),
(132, 'Program srpske politike iz XIX veka ,,Načertanije“ sastavio je:', 'Ilija Garašanin	', 'Dimitrije Davidović', 'Jovan Ristić', 'Jovan Sterija Popović', 7, 7),
(133, 'Sabor u Sremskim Karlovcima drugačije se zove:', 'Majska skupština', 'Proleće naroda', 'Svetoandrejska skupština', 'Karlovačka skupština', 7, 7),
(134, 'Berlinski kongres održan je:', '1878', '1787', '1887', '1888', 7, 7),
(135, 'Hatišerif je:', 'najviši zakon u Turskoj', 'povelja u Austriji', 'program', 'spisak vladara', 7, 7),
(136, 'Član Prvog Trijumvirata nije bio:', 'Emilije Lepid', 'Gaj Julije Cezar', 'Marko Kras', 'Gnej Pompej', 7, 7),
(137, 'Herodot je napisao delo koje se zove:', 'Istorija', 'Dafnid i Hloja', 'Helenska istorija', 'Peloponeski rat', 7, 7),
(138, 'Papir je otkriven u:', 'Kini', 'Grčkoj', 'Mespotamiji', 'Egiptu', 7, 7),
(139, 'Prvi srpski ustanak izbio je na praznik:', 'Sretenje', 'Veliki petak', 'Cveti', 'Božić', 7, 7),
(140, 'Vođa Drugog srpskog ustanka bio je:', 'Miloš Obrenović', 'Karađorđe', 'Mateja Nenadović', 'Stevan Sinđelić', 7, 7),
(141, 'Leonardo da Vinci je slikar iz vremena:', 'renesanse', 'romantizma', 'gotike', 'rokokoa', 10, 9),
(142, 'Kaligrafija je umetnost:', 'lepog pisanja', 'pravljenja cvetnih aranžmana', 'crtanja geografskih karti', 'pravljenja keramičkih posuda', 10, 9),
(143, 'Ko je naslikao delo Avinjonske gospođice?', 'Pablo Pikaso', 'Vinsent van Gog', 'Žiskar d’Esten', 'Salvador Dali', 10, 9),
(144, 'Ogist Renoar predstavnik je:', 'impresionizma', 'postimpresionizma', 'dadaizma', 'apstraktnog ekspresionizma', 10, 9),
(145, 'Delo Atinska škola naslikao je:', 'Rafaelo', 'Rubens', 'Modiljani', 'Botičeli', 10, 9),
(146, 'Francuzi devetom umetnošću (la neuvième art) smatraju i nazivaju oblast:', 'stripa', 'novinarstva', 'politike', 'filozofije', 10, 9),
(147, 'Ko je naslikao Doručak na travi?', 'Eduar Mane', 'Anri Matis', 'Edgar Alan Po', 'Klod Mone', 10, 9),
(148, 'U svom vajarstvu, Henri Mur je, uslovno rečeno, među prvima zamenio masu za:\r\n', 'šupljinu', 'teksturu', 'oblinu', 'reljef', 10, 9),
(149, 'Apstraktno oblikovanje prostora i kompozicija čistim geometrijskim formama karakteristično je za:', 'kubizam', 'futurizam', 'jugend-stil', 'postmodernizam', 10, 9),
(150, 'Na koji element slike deluje tehnika linearne perspektive u umetničkom izrazu?', 'Na veličinu objekta u zavisnosti od distance ', 'Na intezitet boje objekta', 'Na svetlinu u odnosu na referentnu tačku', 'Nijedan odgovor nije tačan', 10, 9),
(151, 'Kada se hromatskim bojama dodaju ahromatske dobija se:', 'paralaksa', 'hromatska aberacija', 'magnifikacija', 'valer', 10, 9),
(152, 'Predstavnik akcionog slikarstva je:', 'Džekson Polok', 'Frensis Bejkon', 'Braca Dimitrijević', 'Džef Kuns', 10, 9),
(153, 'Sjedinjavanje elemenata grčkorimske i istočnjačke umetnosti karakteristično je za:', 'vizantijsku umetnost', 'indijsku umetnost', 'renesansu', 'gotiku', 10, 9),
(154, 'Mikelanđelo Buonaroti, italijanski renesansni vajar i slikar, umro je: ', '1564. godine', '1563. godine', '1464. godine', '1463. godine', 10, 9),
(155, 'Koja od navedenih osoba nije bila slikarka?', 'Žanka Stokić', 'Frida Kalo', 'Olja Ivanjicki', 'Milena Pavlović Barili', 10, 9),
(156, 'Pandan nagradi Američke akademije za film, u oblasti pozorišne umetnosti, je:', 'Toni', 'Leni', 'Emi', 'Talija', 10, 9),
(157, 'Koji umjetnik je sebi odsjekao uvo:', 'Van Gog', 'Pablo Pikaso', 'Edvard Munk', 'Salvador Dali', 10, 9),
(158, 'Istrajnost memorije, slika koju je naslikao Salvador Dali, nastala je:', '1931. godine', '1941. godine', '1921. godine', '1911. godine', 10, 9),
(159, 'Delo poznato i pod nazivom Holandska Mona Liza je delo: ', 'Devojka sa bisernom minđušom', 'Devojka sa srebrom minđušom', 'Devojka sa zlatnom minđušom', 'Devojka sa sjajnom minđušom', 10, 9),
(160, 'Delo Vinsenta Van Goga je: ', 'Autoportret bez brade', 'Gernika', 'Noćna straža', 'Poprsje žene', 10, 9),
(161, 'Pluća su respiratorni organi:', 'viših kičmenjaka', 'puževa', 'leptira', 'suvozemnih zglavkara', 9, 8),
(162, 'Koja žlezda luči hormon tiroksin?', 'štitna žlezda', 'grudna žlezda', 'nadbubrežna žlezda', 'hipofiza', 9, 8),
(163, 'Sporogene bakterije stvaraju:', 'endo i egzospore', 'jednu endosporu', 'više endospora', 'svi odgovori su tačni', 9, 8),
(164, 'Ćelije jednog organizma, koje pripadaju različitim tkivima, razlikuju se po:', 'iRNK molekulima', 'rRNK molekulima', 'tRNK molekulima', 'DNK molekulima', 9, 8),
(165, 'Površinski sloj korena se naziva:', 'rizodermis', 'endodermis', 'epidermis', 'peridermis', 9, 8),
(166, 'Redukcija broja hromozoma se odvija u:', 'anafazi 1', 'telofazi 1', 'metafazi 1', 'profazi 1', 9, 8),
(167, 'Zigot se deli na veći broj blastomera:', 'mitozom', 'mejozom II', 'mejozom I i mejozom II', 'mejozom I', 9, 8),
(168, 'Ribozomi se u ćeliji nalaze:', 'svi odgovori su tačni', 'slobodni u citoplazmi', 'u mitohondrijama', 'na endoplazmatičnoj mreži', 9, 8),
(169, 'Ako je bazni sastav molekula DNK takav da 18% čini timin (T) onda je sadržaj adenina (A):', 'A = 18%', 'A = 82%', 'A = 32%', 'A = 28%', 9, 8),
(170, 'Svojim zadnjim otvorima nosna duplja je široko otvorena prema:', 'gornjem nosnom spratu ždrela', 'donjem grkljanskom spratu ždrela', 'srednjem usnom spratu ždrela', 'srednjem nosnom spratu ždrela', 9, 8),
(171, 'Kom tipu ekoloških faktora pripadaju karakteristike reljefa?', 'orografskim', 'biotičkim', 'klimatskim', 'edafskim', 9, 8),
(172, 'Jod, bakar, mangan, kobalt i cink pripadaju grupi:', 'mikroelemenata', 'makroelemenata', 'ultramikroelemenata', 'ultramakroelemenata', 9, 8),
(173, 'Enzimi koji se sastoje samo iz bjelančevina nazivaju se:', 'prosti enzimi', 'koenzimi', 'sloţeni enzimi', 'apoenzimi', 9, 8),
(174, 'Jedro imaju sve ćelije sisara OSIM:', 'zrelih crvenih krvnih zrnaca', 'nervnih ćelija', 'spermatozoida', 'pojedninih embrionalnih ćelija', 9, 8),
(175, 'Ćelije kojih organizama se najbrže dijele:', 'bakterija', 'poikilotermnih organizama', 'biljaka', 'sisara', 9, 8),
(176, 'Od ektoderma se obrazuje: ', 'nervni sistem', 'srce', 'skelet', 'sistem krvnih sudova', 9, 8),
(177, 'Obrazovanje gemula je tip bespolnog razmnožavanja koji se susreće kod:', 'sunđera', 'ameba', 'puževa', 'vodozemaca', 9, 8),
(178, 'Koji od sljedećih nasljednih poremećaja može nastati kao rezultat nejednakog\r\ncrossing-over-a:', 'sindrom mačjeg plača', 'Edwards-ov sindrom', 'patuljast rast', 'neke od enzimopatija', 9, 8),
(179, 'Kada se iz braka normalnih roditelja rodi sin daltonista moţe se zaključiti da je\r\nporemećaj nasljeđen:', 'od jednog od majčinih roditelja', 'od majčinog ili očevog oca', 'od jednog od očevih roditelja', 'od očevog oca', 9, 8),
(180, 'Najmanju otpornost prema velikim boginjama pokazuju osobe:', 'A krvne grupe', 'B krvne grupe', '0 krvne grupe', 'AB krvne grupe', 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `preporuka`
--

CREATE TABLE `preporuka` (
  `idPreporuke` int(11) NOT NULL,
  `tekst` varchar(256) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `idKatP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `preporuka`
--

INSERT INTO `preporuka` (`idPreporuke`, `tekst`, `idKatP`) VALUES
(1, 'OPSTE ZNANJE NA DLANU - ENCIKLOPEDIJA ZA CELU PORODICU', 3),
(2, 'Podsjeti se najpopularnijih serija svih vremena.', 1),
(3, 'MUZIKA - Velika ilustrovana enciklopedija', 2),
(4, 'ENCIKLOPEDIJA SVEZNANJA - Grupa autora', 4),
(5, 'Pogledaj neke od najboljih filmova svih vremena.', 5),
(6, 'Priseti se velikih sportskih desavanja.', 6),
(7, 'ISTORIJA SVETA - Grupa autora', 7),
(8, 'ŠKOLSKA ENCIKLOPEDIJA BIOLOGIJE - Grupa autora', 8),
(9, 'UMETNOST Velika ilustrovana enciklopedija - Grupa autora', 9);

-- --------------------------------------------------------

--
-- Table structure for table `rezultati`
--

CREATE TABLE `rezultati` (
  `idrezultati` int(11) NOT NULL,
  `poeni` int(11) NOT NULL,
  `datum` date NOT NULL,
  `idKRez` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `rezultati`
--

INSERT INTO `rezultati` (`idrezultati`, `poeni`, `datum`, `idKRez`) VALUES
(1, 6, '2020-05-29', 8),
(2, 3, '2020-05-30', 34);

-- --------------------------------------------------------

--
-- Table structure for table `zahtevmoderatora`
--

CREATE TABLE `zahtevmoderatora` (
  `idZahteva` int(11) NOT NULL,
  `ime` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `prezime` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `biografija` varchar(256) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `idKatZah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `zahtevmoderatora`
--

INSERT INTO `zahtevmoderatora` (`idZahteva`, `ime`, `prezime`, `email`, `biografija`, `username`, `password`, `idKatZah`) VALUES
(3, 'Jovana', 'Jovanic', 'jovanaaa@gmail.com', 'Imam 29 godine. Veliki obozavalac muzike. Zavrsila faukultet. ', 'jovankaaa23', '123456', 2),
(4, 'Milica', 'Milicic', 'micacica@gmail.com', 'Imam 23 godine. Veliki obozavalac geografie. Zavrsila faukultet. ', 'micamicamica232', '123456', 3),
(5, 'Radoje', 'Radojic', 'radojabiterado@gmail.com', 'Imam 26 godine. Veliki obozavalac nauke. Imam diplomu. ', 'radoje1', '123456', 4),
(6, 'Spasa', 'Spasic', 'spaselinka@gmail.com', 'Imam 29 godine. Veliki obozavalac filmova. Zavrsila faukultet. ', 'spaselinkaspasa', '123456', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idKA`);

--
-- Indexes for table `igrac`
--
ALTER TABLE `igrac`
  ADD PRIMARY KEY (`idKI`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentara`),
  ADD KEY `idKKom_idx` (`idKKom`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnika`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`idKM`),
  ADD KEY `idKatMod` (`idKatMod`);

--
-- Indexes for table `motivacionaporuka`
--
ALTER TABLE `motivacionaporuka`
  ADD PRIMARY KEY (`idPoruke`);

--
-- Indexes for table `preporuka`
--
ALTER TABLE `preporuka`
  ADD PRIMARY KEY (`idPreporuke`),
  ADD KEY `idKatP_idx` (`idKatP`);

--
-- Indexes for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD PRIMARY KEY (`idrezultati`),
  ADD KEY `idKRez_idx` (`idKRez`);

--
-- Indexes for table `zahtevmoderatora`
--
ALTER TABLE `zahtevmoderatora`
  ADD PRIMARY KEY (`idZahteva`),
  ADD KEY `idKatZah_idx` (`idKatZah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idKA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `idKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `motivacionaporuka`
--
ALTER TABLE `motivacionaporuka`
  MODIFY `idPoruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preporuka`
--
ALTER TABLE `preporuka`
  MODIFY `idPreporuke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rezultati`
--
ALTER TABLE `rezultati`
  MODIFY `idrezultati` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zahtevmoderatora`
--
ALTER TABLE `zahtevmoderatora`
  MODIFY `idZahteva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `idKA` FOREIGN KEY (`idKA`) REFERENCES `korisnik` (`idKorisnika`);

--
-- Constraints for table `igrac`
--
ALTER TABLE `igrac`
  ADD CONSTRAINT `idKI` FOREIGN KEY (`idKI`) REFERENCES `korisnik` (`idKorisnika`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `idKKom` FOREIGN KEY (`idKKom`) REFERENCES `igrac` (`idKI`);

--
-- Constraints for table `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `idKM` FOREIGN KEY (`idKM`) REFERENCES `korisnik` (`idKorisnika`),
  ADD CONSTRAINT `idKatMod` FOREIGN KEY (`idKatMod`) REFERENCES `kategorija` (`idKategorije`);

--
-- Constraints for table `preporuka`
--
ALTER TABLE `preporuka`
  ADD CONSTRAINT `idKatP` FOREIGN KEY (`idKatP`) REFERENCES `kategorija` (`idKategorije`);

--
-- Constraints for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD CONSTRAINT `idKRez` FOREIGN KEY (`idKRez`) REFERENCES `igrac` (`idKI`);

--
-- Constraints for table `zahtevmoderatora`
--
ALTER TABLE `zahtevmoderatora`
  ADD CONSTRAINT `idKatZah` FOREIGN KEY (`idKatZah`) REFERENCES `kategorija` (`idKategorije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
