-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 03:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `authenticate`
--

CREATE TABLE `authenticate` (
  `regno` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `authenticate`
--

INSERT INTO `authenticate` (`regno`, `status`) VALUES
('18CSR002', 'Verified'),
('18CSR007', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `eventinfo`
--

CREATE TABLE `eventinfo` (
  `eventid` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `staff` varchar(30) NOT NULL,
  `staffid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventinfo`
--

INSERT INTO `eventinfo` (`eventid`, `name`, `staff`, `staffid`, `date`, `description`) VALUES
('ER1506030', 'Enthusia', 'Rajesh', 'ST01056', '0000-00-00', 'Cultural Event'),
('ER1506341', 'NCC Camp', 'Abinash', 'abi', '2020-06-22', 'National Cadet Corps'),
('ER1506551', 'Blood Donation', 'Abinash', 'abi', '2020-06-18', 'Blood Donation camp'),
('ER1506746', 'ABCD Webinar', 'Latha', 'lathars', '2020-06-23', 'Agile CyberSecurity DataScience Webinar'),
('ER1506965', 'Swaram', 'Abinash', 'abi', '2020-06-16', 'Cultural');

-- --------------------------------------------------------

--
-- Table structure for table `getdetails`
--

CREATE TABLE `getdetails` (
  `rollno` varchar(8) NOT NULL,
  `name` varchar(27) DEFAULT NULL,
  `mail` varchar(43) DEFAULT NULL,
  `phone` varchar(54) DEFAULT NULL,
  `batch` int(4) DEFAULT NULL,
  `dept` varchar(3) DEFAULT NULL,
  `sec` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `getdetails`
--

INSERT INTO `getdetails` (`rollno`, `name`, `mail`, `phone`, `batch`, `dept`, `sec`) VALUES
('18CSL239', 'AKILA S', 'aakhilashahai@gmail.com', '9895413616', 2018, 'CSE', 'A'),
('18CSL240', 'ASHWIN.R', 'ashwinacchu10@gmail.com', '6383394481', 2018, 'CSE', 'A'),
('18CSL241', 'GIRIPRASANTH.S', 'giriprasanth61@gmail.com', '7639266305', 2018, 'CSE', 'A'),
('18CSL242', 'GOKULNATH V', 'gokulnat14@gmail.com', '9944076044', 2018, 'CSE', 'A'),
('18CSL243', 'GOWTHAM R', 'gowthamr.18cse@kongu.edu', '8098243916', 2018, 'CSE', 'A'),
('18CSL244', 'KHALID ALI KHAN.K', 'khalibalikhan1999@gmail.com', '8825560182', 2018, 'CSE', 'B'),
('18CSL245', 'MITHUL PRANAV T', 'mithulpranav123@gmail.com', '9487165011', 2018, 'CSE', 'B'),
('18CSL246', 'MOHAMMED NAFEEZ MUFEETH', 'nafeezmufeeth@gmail.com', '9543013608', 2018, 'CSE', 'B'),
('18CSL247', 'MOHAN.P', 'mohamohan2001@gmail.com', '7339041622', 2018, 'CSE', 'B'),
('18CSL248', 'MONISHA.S', 'monishanusha2580@gmail.com', '7868804855', 2018, 'CSE', 'B'),
('18CSL249', 'NANDHINI N', 'nandhinipavi2119@gmail.com', '9629551170', 2018, 'CSE', 'B'),
('18CSL250', 'NANDINI N', 'nagarajnandh99@gmail.com', '6385353293', 2018, 'CSE', 'B'),
('18CSL251', 'NITHYA G', 'nithyaganesan407@gmail.com', '9600833026', 2018, 'CSE', 'C'),
('18CSL252', 'PRABHURAM J', 'ajprabhujpr33@gmail.com', '8610717246', 2018, 'CSE', 'C'),
('18CSL253', 'PRANESH S', 'lovelypranesh1009@gmail.com', '8682807087', 2018, 'CSE', 'C'),
('18CSL254', 'PRAVEEN E', 'praveen31072001@gmail.com', '9360285114', 2018, 'CSE', 'C'),
('18CSL255', 'SWETHA.P', 'swethapalanisamy74@gmail.com', '9843842437', 2018, 'CSE', 'D'),
('18CSL256', 'VASANTH.T', 'vasanthmrt@gmail.com', '9489418071', 2018, 'CSE', 'D'),
('18CSL257', 'VASANTHA KUMAR.K', 'vaskum7010@gmail.com', '6385273838', 2018, 'CSE', 'D'),
('18CSL258', 'VIGNESHWAR.T', 'narvikiaa01@gmail.com', '8667314256', 2018, 'CSE', 'D'),
('18CSR002', 'ABINASH S', 'abinashs.18cse@kongu.edu', '9003326846', 2018, 'CSE', 'A'),
('18CSR003', 'ABIRAMI S P', 'abiramisp.18cse@kongu.edu', '7598137901', 2018, 'CSE', 'A'),
('18CSR004', 'ADHITHIYA GJ', 'adhithiyaganesan@gmail.com', '7871502525', 2018, 'CSE', 'A'),
('18CSR005', 'AJAY KRISHNAA', 'Ajaykrishnaam.18cse@kongu.edu', '9789345803', 2018, 'CSE', 'A'),
('18CSR006', 'AJAY KUMAR K B', 'ajaybalu2000@gmail.com', '9843964484', 2018, 'CSE', 'A'),
('18CSR007', 'AJAY R', 'ajayr.18cse@kongu.edu', '9944790344', 2018, 'CSE', 'A'),
('18CSR008', 'AJITH KUMAR K', 'ajithkumark.18cse@kongu.edu', '8110859406', 2018, 'CSE', 'A'),
('18CSR009', 'AKASH V', 'akashv.18cse@kongu.edu', '9487992268', 2018, 'CSE', 'A'),
('18CSR010', 'AKSHYKUMAR BHIVA MOTE.B', 'akshykumarbhivamoteb.18cse@kongu.edu', '9940899823', 2018, 'CSE', 'A'),
('18CSR011', 'ANANYA M', 'ananyam.18cse@kongu.edu', '6379645099', 2018, 'CSE', 'A'),
('18CSR012', 'ANJU.R', 'anjupriya0301@gmail.com', '9843137133', 2018, 'CSE', 'A'),
('18CSR013', 'R.ANURADHA', 'radhaanu12061@gmail.com', '9159795583', 2018, 'CSE', 'A'),
('18CSR014', 'ANUSRUTI D', 'anusrutid.18cse@kongu.edu', '9442122591', 2018, 'CSE', 'A'),
('18CSR015', 'ARUL PRASATH V', 'arulprasathv.18cse@kongu.edu', '9994198353', 2018, 'CSE', 'A'),
('18CSR016', 'ARVINDKUMAR.P', 'arvindrock006@gmail.com', '9489231654', 2018, 'CSE', 'A'),
('18CSR017', 'ARWIN PRAKADIS RS', 'arwinprakadisrs.18cse@kongu.edu', '6383348013', 2018, 'CSE', 'A'),
('18CSR018', 'ASHWATH G S', 'ashwathgs.18cse@kongu.edu', '9361144460', 2018, 'CSE', 'A'),
('18CSR019', 'ASHWIN.M', 'ashwinmuralidaran@gmail.com', '8248382213', 2018, 'CSE', 'A'),
('18CSR020', 'ASWIN SIRANJEEVI T', 'aswinsiranjeevit18cse@kongu.edu', '7402036773', 2018, 'CSE', 'A'),
('18CSR021', 'K.ASWIN SURYA', 'aswinsuryak.18cse@kongu.edu', '8754956004', 2018, 'CSE', 'A'),
('18CSR022', 'AZHAGUVEL.S', 'azhaguvels.18cse@kongu.edu', '7339155932', 2018, 'CSE', 'A'),
('18CSR023', 'BALAJI M', 'balajimmm59@gmail.com', '7538840076', 2018, 'CSE', 'A'),
('18CSR024', 'BALAJI S', 'balajis.18cse@kongu.edu', '9.1701E+11', 2018, 'CSE', 'A'),
('18CSR025', 'BHARATH S', 'bharathsakthi18@gmail.com', '6379884168', 2018, 'CSE', 'A'),
('18CSR026', 'BHUVANESH S', 'bhuvanesh00103@gmail.com', '6369238009', 2018, 'CSE', 'A'),
('18CSR027', 'BOOMIKA S', 'boomikas.18cse@kongu.edu', '6379148944', 2018, 'CSE', 'A'),
('18CSR028', 'DEEPAK PRASATH G', 'prasathdeepak@gmail.com', '90095716066', 2018, 'CSE', 'A'),
('18CSR029', 'DEEPIKA.K', 'rkdeepikaa@gmail.com', '8248175585', 2018, 'CSE', 'A'),
('18CSR030', 'DEEPTI. R', 'deeptiravi01@gmail.com', '6369375535', 2018, 'CSE', 'A'),
('18CSR031', 'M.DEVI SOWBARNIKAA', 'barnikadevi951@gmail.com', '9360796900', 2018, 'CSE', 'A'),
('18CSR032', 'S.SDHANUSH', 'dhanuniviss@fgmail.com', '9942447470', 2018, 'CSE', 'A'),
('18CSR033', 'S.DHANVARSHA', 'dvsugu2001@gmail.com', '9486193793', 2018, 'CSE', 'A'),
('18CSR034', 'T.DHARANI PRIYA', 'dharanipriyathangaraj18@gmail.com', '7010161962', 2018, 'CSE', 'A'),
('18CSR035', 'DHARATI.N', 'dharatin.18cse@kongu.edu', '8667052110', 2018, 'CSE', 'A'),
('18CSR036', 'B.DHINESHKUMAR', 'dhineshkumarbs001@gmail.com', '8531988989', 2018, 'CSE', 'A'),
('18CSR037', 'DINESHKUMAR L', 'dineshkumarl.18cse@kongu.edu', '7540076137', 2018, 'CSE', 'A'),
('18CSR038', 'S.S.DIVAKAR', 'divasakthi07@gmail.com', '6385228090', 2018, 'CSE', 'A'),
('18CSR039', 'DIVYA R', 'divyar.18cse@kongu.edu', '9.19361E+11', 2018, 'CSE', 'A'),
('18CSR040', 'ERAJA GANAPATHY M', 'erajaganapathym.cse@kongu.edu', '8870575283', 2018, 'CSE', 'A'),
('18CSR041', 'ESAKKI SELVARAJ', 'esakkiselvarajr.18cse@kongu.edu', '6382443358', 2018, 'CSE', 'A'),
('18CSR042', 'R.GANGA SRI', 'gangasrir.18cse@kongu.edu', '7092736883', 2018, 'CSE', 'A'),
('18CSR043', 'GHOKUL KANTH K V', 'ghokulkanthkv@gmail.com', '9788664488', 2018, 'CSE', 'A'),
('18CSR044', 'GOKILAVANI G', 'gkvani1270@gmail.com', '6369137740', 2018, 'CSE', 'A'),
('18CSR045', 'GOKUL.M', 'gokulmurugan1990@gmail.com', '7373909866', 2018, 'CSE', 'A'),
('18CSR046', 'GOKUL S', 'gokuls.18cse@kongu.edu', '6382672456', 2018, 'CSE', 'A'),
('18CSR047', 'V.GOKUL PTASSHANTH', 'gokulvgp3@gmail.com', '9655084944', 2018, 'CSE', 'A'),
('18CSR048', 'GOKUL R', 'gokulr.18cse@kongu.edu', '8300393632', 2018, 'CSE', 'A'),
('18CSR049', 'U.GOWTHAM', 'Gowthamudhai22@gmail.com', '9597780059', 2018, 'CSE', 'A'),
('18CSR050', 'GOWTHAMKRISHNAN S', 'gowthamkrishnans.18cse@kongu.edu', '8825804514', 2018, 'CSE', 'A'),
('18CSR051', 'K.R.HARINI', 'harinikannankrh@gmail.com', '9443941371', 2018, 'CSE', 'A'),
('18CSR052', 'HARINI S', 'harinisakthi.67@gmail.com', '9585666583', 2018, 'CSE', 'A'),
('18CSR053', 'HARIPRAKASH.K', 'hariprakash046@gmail.com', '9487977460', 2018, 'CSE', 'A'),
('18CSR054', 'HARIPRASATH M', 'hari20072001@gmail.com', '9600324514', 2018, 'CSE', 'A'),
('18CSR055', 'HARIPRASATH.V.K', 'harifatuous1999@gmail.com', '9025194496', 2018, 'CSE', 'A'),
('18CSR056', 'HARIPRIYA J', 'priyasasi1527@gmail.com', '9842291941', 2018, 'CSE', 'A'),
('18CSR057', 'HARITHA S', 'harithastv@gmail.com', '8754610299', 2018, 'CSE', 'A'),
('18CSR058', 'HARSETA S', 'harseta99@gmail.com', '7373173158', 2018, 'CSE', 'A'),
('18CSR059', 'HEMANANDHINI.K', 'hemanandhini.pck@gmail.com', '7373118616', 2018, 'CSE', 'A'),
('18CSR060', 'HEMAVATHY. N', 'hemavathyn2000@gmail.com', '9894476738', 2018, 'CSE', 'A'),
('18CSR061', 'INDIRAA K K', 'indiraa16kgm@gmail.com', '9842355705', 2018, 'CSE', 'B'),
('18CSR062', 'INDUJA N', 'indujanainamalairaj@gmail.com', '9384309568', 2018, 'CSE', 'B'),
('18CSR063', 'JAYAPRIYA J', 'jayavasantha2019@gmail.com', '6383786620', 2018, 'CSE', 'B'),
('18CSR064', 'JAYASRI  P V', 'jayasripv2001@gmail.com ', '7558143665', 2018, 'CSE', 'B'),
('18CSR065', 'JEEVA S', 'sjjeeva123@gmail.com', '8098144814', 2018, 'CSE', 'B'),
('18CSR066', 'JEEVAPRIYA S', 'Priyajeeva376p@gmail.com', '7708157148', 2018, 'CSE', 'B'),
('18CSR067', 'JEEVIGHA SHRI P', 'jeevighashri@gmail.com', '9677545430', 2018, 'CSE', 'B'),
('18CSR068', 'JHOHITH KG', 'jhohithkecian1421@gmail.com', '9965866999', 2018, 'CSE', 'B'),
('18CSR069', 'JITHENDIRAN E K', 'jidesh0410@gmail.com', '9994986888', 2018, 'CSE', 'B'),
('18CSR070', 'JOHN PRAVEEN A', 'johnpraveen2778@gmail.com', '9688381481', 2018, 'CSE', 'B'),
('18CSR071', 'KAAVIYAA A', 'kaaviyaa190701@gmail.com', '6369176261', 2018, 'CSE', 'B'),
('18CSR072', 'KABI', 'kabineshk2001@gmail.com', '7598048391', 2018, 'CSE', 'B'),
('18CSR073', 'KADHAMBARI S', 'kadhambarisamraj@gmail.com', '9942760304', 2018, 'CSE', 'B'),
('18CSR074', 'KALAIVANI S P', 'kalaivanisp2000@gmail.com', '9790586539', 2018, 'CSE', 'B'),
('18CSR076', 'KAMALESH K', 'kamalkscse@gmail.com', '6385730235', 2018, 'CSE', 'B'),
('18CSR077', 'KAMALI         R', 'kamaliramesh2110@gmail.com', '6379129950', 2018, 'CSE', 'B'),
('18CSR078', 'KANISHK R C', 'kanishk.kongu@gmail.com', '7373485899', 2018, 'CSE', 'B'),
('18CSR079', 'KANNAN B', 'kannan080701@gmail.com', '7339255840', 2018, 'CSE', 'B'),
('18CSR080', 'KARTHI S', 'karthiselvam2178@gmail.com', '6374943844', 2018, 'CSE', 'B'),
('18CSR081', 'KARTHIK T', 'karthikthiyagarajan07@gmail.com', '6379796297', 2018, 'CSE', 'B'),
('18CSR082', 'KARTHIKA P', 'karthikapalanisamy737@gmail.com', '9445323249', 2018, 'CSE', 'B'),
('18CSR083', 'KARTHIKA .V', 'karthikavenkatachalam2000@gmail.com', '', 2018, 'CSE', 'B'),
('18CSR084', 'KARTHIKRAJA. R', 'rkarthikraja606@gmail.com', '9750167588', 2018, 'CSE', 'B'),
('18CSR085', 'KARUNAKARAN R', 'karunakaranrk2001@gmail.com', '7868879132', 2018, 'CSE', 'B'),
('18CSR086', 'KEERTHIVASAN M', 'Keerthivasanm20@gmail.com ', '8428196719', 2018, 'CSE', 'B'),
('18CSR087', 'KEVIN RUBAN D', 'kevinruban456@gmail.com', '9789388977', 2018, 'CSE', 'B'),
('18CSR088', 'KIRANBHARATH K', 'kiransd378@gmail.com', '9677681068', 2018, 'CSE', 'B'),
('18CSR089', 'KISHORE N', 'kishorenataraj939@gmail.com', '97090443260', 2018, 'CSE', 'B'),
('18CSR090', 'KRITHIKA.S', 'keerthisomu8@gmail.com', '8220220667', 2018, 'CSE', 'B'),
('18CSR091', 'KUMARESAN R', 'kumaresankumar1924@gmail.com', '6379047974', 2018, 'CSE', 'B'),
('18CSR092', 'LAVANYA. G', 'lavu.govindha@gmail.com', '7395895096', 2018, 'CSE', 'B'),
('18CSR093', 'LAWVANYA PRIYA.T', 'priyathiruvasagam@gmail.com', '9487600539', 2018, 'CSE', 'B'),
('18CSR094', 'LEKSHMI S L', 'lekshmi.mani74@gmail.com', '8903267912', 2018, 'CSE', 'B'),
('18CSR095', 'LOGESH T', 'logesh1892000@gmail.com', '7305746782', 2018, 'CSE', 'B'),
('18CSR096', 'LOHAPPRIYA D', 'dlpriyankl@gmail.com', '6369348762', 2018, 'CSE', 'B'),
('18CSR097', 'LOKESH RANGANATHAN VELUMANI', 'lokeshdhinesh56@gmail.com', '9994958088', 2018, 'CSE', 'B'),
('18CSR098', 'MADHUVANAN S', 'madhuvanan55@gmail.com', '9600441156', 2018, 'CSE', 'B'),
('18CSR099', 'MAGHATHANI S', 'maghasubramani2001@gmail.com', '9790464858', 2018, 'CSE', 'B'),
('18CSR100', 'MAILVIZHI S', 'mailvizhisakthivel@gmail.com', '9677410433', 2018, 'CSE', 'B'),
('18CSR101', 'M.MANGALAPRASATH', 'agilprasath2001@gmail.com', '9442630666', 2018, 'CSE', 'B'),
('18CSR102', 'MANJUNATH', 'manjunath. rajavel@gmail.com', '6383323050', 2018, 'CSE', 'B'),
('18CSR103', 'MANOJ PRABAKARAN R', 'manojpraba0125@gmail.com', '7708798471', 2018, 'CSE', 'B'),
('18CSR104', 'MANOOWRANJITH A J ', 'a.j.manoow@gmail.com', '7339162631', 2018, 'CSE', 'B'),
('18CSR105', 'MEIARASU K', 'gauthammeiarasu@gmail.com', '8300070410', 2018, 'CSE', 'B'),
('18CSR106', 'MITHILESH KRISHNA S', 'mithileshkrishna20@gmail.com', '9159539371', 2018, 'CSE', 'B'),
('18CSR107', 'MITHINESH P', 'mithinesh2001@gmail.com', '9489021251', 2018, 'CSE', 'B'),
('18CSR108', 'MITHUN VISHNU M', 'mithunvishnu66@gmail.com', '9677972704', 2018, 'CSE', 'B'),
('18CSR109', 'MOHAMED SAMEER    ', 'mohamedsameer@gmail.com', '8667009711', 2018, 'CSE', 'B'),
('18CSR110', 'MOHAN KUMAR.D', 'mohancr711@gmail.com ', '7358996861', 2018, 'CSE', 'B'),
('18CSR111', 'MUKHILVANNAN  B', 'mukhilv2307@gmail.com', '6382823766', 2018, 'CSE', 'B'),
('18CSR112', 'MUTHU BALAJI P', 'muthutamilan28@gmail.com', '8124820044', 2018, 'CSE', 'B'),
('18CSR113', 'MYTHILIPPRIYA S G', 'priyasankar1872@gmail.com', '8056394170', 2018, 'CSE', 'B'),
('18CSR114', 'MYTHILY.S', 'mythilycse2001@gmail.com', '8903424322', 2018, 'CSE', 'B'),
('18CSR115', 'NAGAMMAI S', 'snagammai2101@gmail.com', '6379594539', 2018, 'CSE', 'B'),
('18CSR116', 'NANDHA KUMAR S', 'nandykongu@gmail.com', '6383449908', 2018, 'CSE', 'B'),
('18CSR117', 'NANTHINI K', 'tamilnanthu555@gmail.com', '6383691630', 2018, 'CSE', 'B'),
('18CSR118', 'NARMATHA B R', 'narmatha0910@gmail.com', '7548872474', 2018, 'CSE', 'B'),
('18CSR119', 'NAVEEN KUMAR N', 'navee784586@gmail.com', '7548872229', 2018, 'CSE', 'B'),
('18CSR120', 'NAVEEN PRASAD T', 'naveenblitz@gmail.com', '9798142781', 2018, 'CSE', 'B'),
('18CSR121', 'NAVIN A E', 'navinandres@gmail.com', '9944995714', 2018, 'CSE', 'C'),
('18CSR122', 'NINISA B A', 'ninisaba5858@gmail.com', '6369048217', 2018, 'CSE', 'C'),
('18CSR123', 'NIVASHINI K', 'knivash2000@gmail.com ', '9894335846', 2018, 'CSE', 'C'),
('18CSR124', 'NOWNEESH T', 'nowneesh123@gmail.com', '9965552513', 2018, 'CSE', 'C'),
('18CSR125', 'OBULI SAI NAREN', '66naren@gmail.com', '9003743543', 2018, 'CSE', 'C'),
('18CSR126', 'OM SURYA PRAKASH A', 'aomsuryaprakash@gmail.com', '9688931547', 2018, 'CSE', 'C'),
('18CSR127', 'PALANI KUMAR M', 'kumarpalani718@gmail.com', '7708429288', 2018, 'CSE', 'C'),
('18CSR128', 'POONGUNDRAN M', 'poongundranms007@gmail.com', '9080067899', 2018, 'CSE', 'C'),
('18CSR129', 'PRAANESH P S', 'praanesh.ps@gmail.com', '9489676667', 2018, 'CSE', 'C'),
('18CSR130', 'PRABU B', 'prabuempire861@gmail.com ', '9578254856', 2018, 'CSE', 'C'),
('18CSR131', 'PRADEEP C', 'pradeepchellamuthu78445@gmail.com', '9787136466', 2018, 'CSE', 'C'),
('18CSR132', 'PRADEEP A', 'pradeepjesu23@gmail.com ', '9597980415', 2018, 'CSE', 'C'),
('18CSR133', 'PRADHOSH S S', 'sspradhosh5144@gmail.com', '8870601585', 2018, 'CSE', 'C'),
('18CSR134', 'PRAKALYA M', 'prakalyamanivel@gmail.com', '9488274092', 2018, 'CSE', 'C'),
('18CSR135', 'PRAKASH A A', 'prakashcse135@gami.com', '6379867010', 2018, 'CSE', 'C'),
('18CSR136', 'PRAMOD A N', 'pramodarjunan47@gmail.com', '9095723501', 2018, 'CSE', 'C'),
('18CSR137', 'PRANESH KUMAR M', 'praneshkumartkd@gmail.com', '9865625458', 2018, 'CSE', 'C'),
('18CSR138', 'PRASANTH S', 'prasanthodin@gmail.com', '9952717393', 2018, 'CSE', 'C'),
('18CSR139', 'PRASATH M', 'vickyprasath1401 @gmail.com', '7339049041', 2018, 'CSE', 'C'),
('18CSR140', 'PRATHEKSHA K', 'prathe.sk@gmail.com ', '7397150110', 2018, 'CSE', 'C'),
('18CSR141', 'PRAVEEN C', 'praveencse170301@gmail.com                 ', '9543834393', 2018, 'CSE', 'C'),
('18CSR142', 'PRAVEEN M', 'praveencr707@gmail.com ', '7358428562', 2018, 'CSE', 'C'),
('18CSR143', 'PRAVEENA N', 'praveenapravi104@gmail.com', '8778522997', 2018, 'CSE', 'C'),
('18CSR144', 'PRAVEENKUMAR M', 'praveenkumar100501@gmail.com', '7339287365', 2018, 'CSE', 'C'),
('18CSR145', 'PRAVIN KUMAR S', 'pravinsridhar6@gmail.com', '8248347362', 2018, 'CSE', 'C'),
('18CSR146', 'PRAVIN RAJ A', 'rajpravin013@gmail.com', '9786256432', 2018, 'CSE', 'C'),
('18CSR147', 'PREETHEES S', 'spreethees25122000@gmail.com', '9025021106', 2018, 'CSE', 'C'),
('18CSR148', 'PREMKUMAR K', 'selvapremkumar007@gmail.com', '9952585818', 2018, 'CSE', 'C'),
('18CSR149', 'RAGHUL S', 'raghulsiva2018@gmail.com', '6382627750', 2018, 'CSE', 'C'),
('18CSR150', 'RAGHUPRIYANTH R', 'raghupriyanth@gmail.com', '6369349614', 2018, 'CSE', 'C'),
('18CSR151', 'RAGUNANTHAN S', 'raguselva2001@gmail.com', '7548826844', 2018, 'CSE', 'C'),
('18CSR152', 'RAJARAMAN B', 'rajaramanbrigadeeswaran@gmail.com', '8903624976', 2018, 'CSE', 'C'),
('18CSR153', 'RAJHARINI R', 'nakshatra4lyf@gmail.com ', '7358971780', 2018, 'CSE', 'C'),
('18CSR154', 'RAKESH ROSHAN M', 'rakeshroshan2001m@gmail.com', '8608439070', 2018, 'CSE', 'C'),
('18CSR155', 'RAKSHITHA R', 'rakshitharaja2000@gmail.com', '6369353310', 2018, 'CSE', 'C'),
('18CSR156', 'RANGARAAJ V', 'rangaraaj1@gmail.com', '8667631594', 2018, 'CSE', 'C'),
('18CSR157', 'RANKISH K', 'rankishabd@gmail.com', '8072505321', 2018, 'CSE', 'C'),
('18CSR158', 'RAVIRAAM V S', 'vsraviraam123@gmail.com', '7708756119', 2018, 'CSE', 'C'),
('18CSR159', 'RAZEEN I', 'razeeniqbal11@gmail.com', '9487312098', 2018, 'CSE', 'C'),
('18CSR160', 'RIMA P', 'primasweris@gmail.com', '9442388838', 2018, 'CSE', 'C'),
('18CSR161', 'RITHIK M', 'rithikmks2000@gmail.com', '8903460952', 2018, 'CSE', 'C'),
('18CSR162', 'ROHINTH T', 'rohinththirumalaisamy6356@gmail.com', '7871833242', 2018, 'CSE', 'C'),
('18CSR163', 'RUBASHREE V', 'rubavenkat2001@gmail.com', '9865473725', 2018, 'CSE', 'C'),
('18CSR164', 'SAI HARITHA S', 'saiharitha69@gmail.com', '9500455005', 2018, 'CSE', 'C'),
('18CSR165', 'SAKTHI MURUGAVEL B', 'sakthi.bask@gmail.com', '9500733113', 2018, 'CSE', 'C'),
('18CSR166', 'SAKTHI PRASANNA S', 'prasannakec166@gmail.com', '9566683697', 2018, 'CSE', 'C'),
('18CSR167', 'SAKTHI SRI S V', 'svsakthisri@gmail.com', '9952173183', 2018, 'CSE', 'C'),
('18CSR168', 'SAKTHI S', 'sakthisaravanan1545@gmail.com', '9384760207', 2018, 'CSE', 'C'),
('18CSR169', 'SAMIKSHA M', 'samikshasundaram@gmail.com', '6369092497', 2018, 'CSE', 'C'),
('18CSR170', 'SANJANA SHURUTHY K', 'sanjanashuruthy18@gmail.com', '6374380455', 2018, 'CSE', 'C'),
('18CSR171', 'SANJAY NITHISH K S', 'sanjayslk90@gmail.com', '6383186709', 2018, 'CSE', 'C'),
('18CSR172', 'SANJAY KUMAR D', 'sanjayk48136@gmail.com', '6382073694', 2018, 'CSE', 'C'),
('18CSR173', 'SANJAY S', 'sanjaysivakumar7@gmail.com', '9585810366', 2018, 'CSE', 'C'),
('18CSR174', 'SANJAYAN S', 'ssanjayan2001@gmail.com ', '7373054972', 2018, 'CSE', 'C'),
('18CSR175', 'SANJEETH S', 'ssanjitheid@gmail.com', '6369028658', 2018, 'CSE', 'C'),
('18CSR176', 'SANJUTHA S S', 'sanjuthasenthil@gmail.c', '6369376373', 2018, 'CSE', 'C'),
('18CSR177', 'SANMUHAPRIYA S', 'priyasekar478@gmail.com', '6385701666', 2018, 'CSE', 'C'),
('18CSR178', 'SARATH KUMAR S', 'amma2016ssk@gmail.com', '9361424511', 2018, 'CSE', 'C'),
('18CSR179', 'SARVESHWARAN M', 'sarveshwaran0011@gmail.com', '7373061755', 2018, 'CSE', 'C'),
('18CSR180', 'SATHYAPRIYA', 'sathyapriya12001@gmail.com', '8220060515', 2018, 'CSE', 'D'),
('18CSR181', 'SELVENDHIRAN.S', 'selvendhiranindru@gmail.com', '6383767644', 2018, 'CSE', 'D'),
('18CSR182', 'SHAKIL AHAMED R', 'ahamedshakil55@gmail.com', '9080549204', 2018, 'CSE', 'D'),
('18CSR183', 'SHANMATHI.B', 'shanmathikrish28@gmail.com', '8610778146', 2018, 'CSE', 'D'),
('18CSR184', 'SHANMATHI.C', 'shanmathi200@gmail.com', '9865987177', 2018, 'CSE', 'D'),
('18CSR185', 'A.SHERLIP EVELIN', 'sherlipivelin@gmail.com', '8248728223', 2018, 'CSE', 'D'),
('18CSR186', 'SHREERAAGAV S', 'shreeraagav2012@gmail.com', '9629458933', 2018, 'CSE', 'D'),
('18CSR187', 'SHRINIDHI V', 'shrinidhivenkat2001@gmail.com', '8903411389', 2018, 'CSE', 'D'),
('18CSR188', 'SHWETHA K', 'shwethakrishnan0409@gmail.com', '   9600548274                                        \n', 2018, 'CSE', 'D'),
('18CSR189', 'SIVAKESH C R', 'sivakcr8@gmail.com', '9597587544', 2018, 'CSE', 'D'),
('18CSR190', 'SIVAKUMAR P', ', pksivakumar2000@gmail.com', '9944860449', 2018, 'CSE', 'D'),
('18CSR191', 'SNEHA . K', 'snehajkn@gmail.com', '8270525228', 2018, 'CSE', 'D'),
('18CSR192', 'SNEKHA S', 'snekhashankar@gmail.com', '7598968766', 2018, 'CSE', 'D'),
('18CSR193', 'SOBIKA.S', 'sobikas1011@gmail.com', '9629455990', 2018, 'CSE', 'D'),
('18CSR194', 'SOUNDHAR K K', 'soundharnamakkal@gmail.com', '9629017465', 2018, 'CSE', 'D'),
('18CSR195', 'SRI YAZHINI DEVI.M', 'sriyazhinidevi12@gmail.com', '8754715901', 2018, 'CSE', 'D'),
('18CSR196', 'SRIDHAR S', 'sridhar25600@gmail.com', '9790559866', 2018, 'CSE', 'D'),
('18CSR197', 'SRIDHARAN S', 'sridharan271@gmail.com', '7358974673', 2018, 'CSE', 'D'),
('18CSR198', 'SRINATH A', 'srinathppm@gmail.con', '8610282810', 2018, 'CSE', 'D'),
('18CSR199', 'SRINATH P', 'sriparasuram2000@gmail.com', '6383008829', 2018, 'CSE', 'D'),
('18CSR200', 'SUBAHARINI C', 'subaharini3010@gmail.com', '8489006790', 2018, 'CSE', 'D'),
('18CSR201', 'SUBASH B S', 'subashshanu3sj122001@gmail.com', '9843824700', 2018, 'CSE', 'D'),
('18CSR203', 'SUGANTH C', 'suganthsuganth6@gmail.com', '9842492289', 2018, 'CSE', 'D'),
('18CSR204', 'SUGANTHAKUMAR G', 'suganth200131@gmail.com', '9842974188', 2018, 'CSE', 'D'),
('18CSR205', 'SULOCHANA M', 'sulochanamalarkodi@gmail.com', '8754368482', 2018, 'CSE', 'D'),
('18CSR206', 'SUNDARESHWAR V A', 'sundarsamboornam@gmail.com', '6369352583', 2018, 'CSE', 'D'),
('18CSR207', 'SURENDAR V', 'surendher21z@gmail.com', '9677704408', 2018, 'CSE', 'D'),
('18CSR208', 'SURIYA N U', 'suriyanu1601@gmail.com', '8300706425', 2018, 'CSE', 'D'),
('18CSR209', 'SURYAPRAKASH V', 'suriyavallavan@gmail.com ', '8489746357', 2018, 'CSE', 'D'),
('18CSR210', 'SURYA NARAYANAN N R', 'suryagokul0713@gmail.com', '8098633652', 2018, 'CSE', 'D'),
('18CSR211', 'V.SURYA PRAKASH', 'suryavmds7000@gmail.com', '6383575515', 2018, 'CSE', 'D'),
('18CSR212', 'SURYA RAHUL K', 'suryarhul2000@gmail.com', '9843382449', 2018, 'CSE', 'D'),
('18CSR213', 'B.S.SWARNA SURUTHI', 'swarnasuruthi23@gmail.com', '6374959295', 2018, 'CSE', 'D'),
('18CSR214', 'SWATHI M', 'swathimathi2000@gmail.com', '9486181372', 2018, 'CSE', 'D'),
('18CSR215', 'SYED JAMAL HARRIS R', 'syedharris726@gmail.com', '8220457544', 2018, 'CSE', 'D'),
('18CSR216', 'K.TAMIL ELAKKIYA', 'elakkiyatamil2001@gmail.com', '9677767234', 2018, 'CSE', 'D'),
('18CSR217', 'TAMILKUMAR R', 'tamilbaby2710@gmail.com', '6382601560', 2018, 'CSE', 'D'),
('18CSR218', 'TAQMEEL ZUBEIR', 'dtzubeir@gmail.com', '7845383792', 2018, 'CSE', 'D'),
('18CSR219', 'THAARINI S', 'thaarinike@gmail.com', '9976469329', 2018, 'CSE', 'D'),
('18CSR220', 'THANIGACHALAM.A', 'thanigachalamarumugam2001@gmail.com', '9500759283', 2018, 'CSE', 'D'),
('18CSR221', 'THEJESVIKA S S', 'thejesvikashanmugaraj@gmail.com', '8807134994', 2018, 'CSE', 'D'),
('18CSR222', 'THENNAVAN K V', 'thennavan950@gmail.com', '6369266503', 2018, 'CSE', 'D'),
('18CSR223', 'UDHAYANIDHI.C', 'udhayanidhi3001@gmail.com', '9361794714', 2018, 'CSE', 'D'),
('18CSR224', 'VAIBHAV R', 'rvaibhav29112000@gmail.com', '9597451851', 2018, 'CSE', 'D'),
('18CSR225', 'VAISHNAVI.S', 'svaish2000@gmail.com', '9500977257', 2018, 'CSE', 'D'),
('18CSR226', 'VARUNMADESH.R', 'varunmadesh8@gmail.com', '8098150199', 2018, 'CSE', 'D'),
('18CSR227', 'VASANTH KUMAR T', 'vasanthulasidass@gmail.com', '9698040311', 2018, 'CSE', 'D'),
('18CSR228', 'VEERAMANIKANDAN P', 'vkp05498@gmail.com', '6383155163', 2018, 'CSE', 'D'),
('18CSR229', 'VIGNESH V', 'vigneshv.18cse@kongu.edu', '8110090266', 2018, 'CSE', 'D'),
('18CSR230', 'T K VIKASH RAJ', 'vikashkkr2000@gmail.com', '8220406806', 2018, 'CSE', 'D'),
('18CSR231', 'VIMAL PRAKASH N K K', 'vimalprakash.621@gmai.com', '8838869910', 2018, 'CSE', 'D'),
('18CSR232', 'VIMALRAJ S', 'vimalraj00280@gmail.com', '8098904180', 2018, 'CSE', 'D'),
('18CSR233', 'YAMUNA.C', 'yamuna20001030@gmail.com', '9600972233', 2018, 'CSE', 'D'),
('18CSR234', 'YASHWANTH K ', 'yashwanthkkn@gmail.com ', '8220827444', 2018, 'CSE', 'D'),
('18CSR235', 'YASWANTH R', 'yaswanthkec@gmail.com', '9842231810', 2018, 'CSE', 'D'),
('18CSR236', 'P.YOGA PRIYA', 'yogapriya342001@gmail.com', '9443581189', 2018, 'CSE', 'D'),
('18CSR237', 'YOKESH P', 'chrisyokesh77@gmail.com', '8883669533', 2018, 'CSE', 'D'),
('18CSR238', 'YUVAN PRASAD.S', 'yuvanprasad2001@gmail.com', '7845516789', 2018, 'CSE', 'D'),
('CSR001', 'AARTHY S', 'aarthysrinivasan6@gmail.com', '8270881074', 2018, 'CSE', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `noncertinfo`
--

CREATE TABLE `noncertinfo` (
  `appno` varchar(16) NOT NULL,
  `day` int(11) NOT NULL,
  `hrs` varchar(20) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `noncertod`
--

CREATE TABLE `noncertod` (
  `appno` varchar(16) NOT NULL,
  `regno` varchar(8) NOT NULL,
  `appdate` date NOT NULL,
  `need` varchar(100) NOT NULL,
  `appfacty` varchar(30) NOT NULL,
  `activity` varchar(25) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `nodays` int(11) NOT NULL,
  `advisor` varchar(20) NOT NULL DEFAULT 'Pending',
  `yearin` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `oddetails`
--

CREATE TABLE `oddetails` (
  `appno` varchar(25) NOT NULL,
  `regno` varchar(8) NOT NULL,
  `appdate` date NOT NULL,
  `odtype` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL,
  `odfrom` date NOT NULL,
  `odto` date NOT NULL,
  `hrs` varchar(8) NOT NULL,
  `college` varchar(40) NOT NULL,
  `state` varchar(25) NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `oddetails`
--

INSERT INTO `oddetails` (`appno`, `regno`, `appdate`, `odtype`, `title`, `odfrom`, `odto`, `hrs`, `college`, `state`, `purpose`, `status`) VALUES
('18CSE002060441', '18CSR002', '2020-06-14', 'SPORT', 'aefwtryhg', '2020-06-14', '2020-06-15', 'half', 'igyutfgjhsakld', 'TAMILNADU', 'sdfsdfsd', 'Pending'),
('18CSE002070694', '18CSR002', '2020-06-07', 'PAPER', 'Big Data ', '2020-06-09', '2020-06-15', 'full', 'PSG iTech', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE002080618', '18CSR002', '2020-06-08', 'PROJECT', 'Hello', '2020-06-10', '2020-06-12', 'full', 'Kongu', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE002090414', '18CSR002', '2020-04-09', 'SPORT', 'God ', '2020-04-10', '2020-04-10', 'half', 'Kongu Engineering', 'OTHERSTATE', 'hfxfhgjgjkh', 'Pending'),
('18CSE002230339', '18CSR002', '2020-06-14', 'PAPER', 'Big Data', '2020-03-24', '2020-03-24', 'full', 'PSG iTech', 'TAMILNADU', 'Just for cheking purpose', 'Pending'),
('18CSE002240398', '18CSR002', '2020-03-24', 'PAPER', 'Foot Ball', '2020-03-25', '2020-03-25', 'half', 'Kongu Engineering COlelge', 'OTHERSTATE', 'Final Match aojoajd', 'Pending'),
('18CSE002300490', '18CSR002', '2020-04-30', 'PROJECT', 'Automatic Vending Machine', '2020-05-01', '2020-05-02', 'full', 'Kumaraguru College of Technology', 'TAMILNADU', 'Nothing Much', 'Pending'),
('18CSE007160410', '18CSR007', '2020-04-16', 'PAPER', 'Big Data', '2020-04-17', '2020-04-17', 'full', 'Kongu', 'TAMILNADU', 'Getting in to that college', 'Approved'),
('18CSE007240526', '18CSR007', '2020-05-24', 'PROJECT', 'Checking', '2020-05-25', '2020-05-25', 'full', 'KEC', 'TAMILNADU', 'Precessing', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `othercert`
--

CREATE TABLE `othercert` (
  `appno` varchar(25) NOT NULL,
  `regno` varchar(8) NOT NULL,
  `appdate` date NOT NULL,
  `type` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `days` varchar(8) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `state` varchar(25) NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `othercert`
--

INSERT INTO `othercert` (`appno`, `regno`, `appdate`, `type`, `title`, `start`, `end`, `days`, `cname`, `state`, `purpose`, `file`, `status`) VALUES
('CR18CSE002050420', '18CSR002', '2020-04-05', 'IPT\r\n', 'asdasdasdasd', '2020-04-07', '2020-04-08', '2', 'asdasdsad', 'inside tamilnadu', 'asdasdasd', 'CR18CSR002_COURSE_12APR_2956.pdf', 'Approved'),
('CR18CSE002120459', '18CSR002', '2020-04-12', 'WORKSHOP', 'Student', '2020-03-01', '2020-04-01', '32', 'Guvi', 'Inside Tamilnadu', 'ihaghda', 'CR18CSR002_WORKSHOP_12APR_4566.pdf', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `postod`
--

CREATE TABLE `postod` (
  `appno` varchar(25) NOT NULL,
  `prize` varchar(20) DEFAULT NULL,
  `certificate` varchar(30) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `postod`
--

INSERT INTO `postod` (`appno`, `prize`, `certificate`, `status`) VALUES
('18CSE002070694', 'FIRST', '18CSR002__07JUN_1424.pdf', 'Approved'),
('18CSE002240398', 'FIRST', '18CSR002__29APR_5997.pdf', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `preod`
--

CREATE TABLE `preod` (
  `appno` varchar(25) NOT NULL,
  `staff1` varchar(20) DEFAULT NULL,
  `comments1` varchar(50) DEFAULT NULL,
  `status1` varchar(10) DEFAULT NULL,
  `staff2` varchar(20) DEFAULT NULL,
  `comments2` varchar(50) DEFAULT NULL,
  `status2` varchar(10) DEFAULT NULL,
  `staff3` varchar(20) DEFAULT NULL,
  `comments3` varchar(50) DEFAULT NULL,
  `status3` varchar(10) DEFAULT NULL,
  `advisor` varchar(15) NOT NULL DEFAULT 'Pending',
  `yearin` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `preod`
--

INSERT INTO `preod` (`appno`, `staff1`, `comments1`, `status1`, `staff2`, `comments2`, `status2`, `staff3`, `comments3`, `status3`, `advisor`, `yearin`) VALUES
('18CSE002060441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending'),
('18CSE002070694', 'Abinash', 'asdah', 'Approved', 'Abinash', 'good', 'Approved', 'Abinash', 'dsfddf', 'Approved', 'Approved', 'Approved'),
('18CSE002080618', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending'),
('18CSE002090414', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending'),
('18CSE002230339', 'maliga', 'nice', 'Approved', 'Nandhini', 'Good', 'Approved', 'Chitra', 'Good', 'Approved', 'Pending', 'Pending'),
('18CSE002240398', 'abi', 'Good', 'Approved', 'abi', 'Very Good', 'Approved', 'Abinash', 'good presentation', 'Approved', 'Approved', 'Pending'),
('18CSE002300490', 'Abinash', 'Very nice explanation', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending'),
('18CSE007160410', 'malliga', 'good', 'Approved', 'latha', 'good', 'Approved', 'Geethaaaa', 'goodu', 'Approved', 'Approved', 'Pending'),
('18CSE007240526', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regno` varchar(8) NOT NULL,
  `name` varchar(40) NOT NULL,
  `batch` int(11) NOT NULL,
  `dept` varchar(4) NOT NULL,
  `sec` varchar(1) NOT NULL,
  `gender` varchar(7) NOT NULL DEFAULT 'male',
  `mail` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regno`, `name`, `batch`, `dept`, `sec`, `gender`, `mail`, `phone`, `pass`) VALUES
('18CSR002', 'Abinash S', 2018, 'CSE', 'A', 'male', 'abinashs.18cse@kongu.edu', 8807973185, '202cb962ac59075b964b07152d234b70'),
('18CSR007', 'AJAY R', 2018, 'CSE', 'A', 'female', 'ajayr.18cse@kongu.edu', 9944790344, '202cb962ac59075b964b07152d234b70'),
('18CSR015', 'ARUL PRASATH V', 2018, 'CSE', 'A', 'male', 'arulprasathv.18cse@kongu.edu', 9994198353, '1adf7abd51c72c622611dfa19339e603');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `dept` varchar(5) NOT NULL,
  `batch` varchar(4) NOT NULL,
  `sec` varchar(2) NOT NULL,
  `designation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `name`, `userid`, `pass`, `mail`, `dept`, `batch`, `sec`, `designation`) VALUES
('12345', 'Abinash', 'abi', '202cb962ac59075b964b07152d234b70', 'abi@kongu.ac.in', 'CSE', '2018', 'A', 'Advisor'),
('102', 'Latha', 'lathars', '202cb962ac59075b964b07152d234b70', 'latha@kongu.edu', 'CSE', '2018', 'A', 'Year in Charge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authenticate`
--
ALTER TABLE `authenticate`
  ADD PRIMARY KEY (`regno`);

--
-- Indexes for table `eventinfo`
--
ALTER TABLE `eventinfo`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `getdetails`
--
ALTER TABLE `getdetails`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `noncertinfo`
--
ALTER TABLE `noncertinfo`
  ADD PRIMARY KEY (`appno`,`day`);

--
-- Indexes for table `noncertod`
--
ALTER TABLE `noncertod`
  ADD PRIMARY KEY (`appno`),
  ADD KEY `Foreign` (`regno`);

--
-- Indexes for table `oddetails`
--
ALTER TABLE `oddetails`
  ADD PRIMARY KEY (`appno`),
  ADD KEY `regno constraint` (`regno`);

--
-- Indexes for table `othercert`
--
ALTER TABLE `othercert`
  ADD PRIMARY KEY (`appno`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `postod`
--
ALTER TABLE `postod`
  ADD PRIMARY KEY (`appno`),
  ADD UNIQUE KEY `certificate` (`certificate`);

--
-- Indexes for table `preod`
--
ALTER TABLE `preod`
  ADD PRIMARY KEY (`appno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`regno`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phoenee` (`phone`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `staffid` (`staffid`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `noncertinfo`
--
ALTER TABLE `noncertinfo`
  ADD CONSTRAINT `nonappno constraint` FOREIGN KEY (`appno`) REFERENCES `noncertod` (`appno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `noncertod`
--
ALTER TABLE `noncertod`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`regno`) REFERENCES `registration` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oddetails`
--
ALTER TABLE `oddetails`
  ADD CONSTRAINT `regno constraint` FOREIGN KEY (`regno`) REFERENCES `registration` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `othercert`
--
ALTER TABLE `othercert`
  ADD CONSTRAINT `regno` FOREIGN KEY (`regno`) REFERENCES `registration` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postod`
--
ALTER TABLE `postod`
  ADD CONSTRAINT `appno contraint` FOREIGN KEY (`appno`) REFERENCES `oddetails` (`appno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preod`
--
ALTER TABLE `preod`
  ADD CONSTRAINT `appno` FOREIGN KEY (`appno`) REFERENCES `oddetails` (`appno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
