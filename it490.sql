-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: it490
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bmi`
--

DROP TABLE IF EXISTS `bmi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `bmi` float(11,1) DEFAULT NULL,
  `metric` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `bmi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmi`
--

LOCK TABLES `bmi` WRITE;
/*!40000 ALTER TABLE `bmi` DISABLE KEYS */;
INSERT INTO `bmi` VALUES (4,140,62,25.6,1),(5,45,24,54.9,1),(6,NULL,NULL,NULL,0),(7,195,71,27.2,1),(8,40,54,137.2,-1);
/*!40000 ALTER TABLE `bmi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calbudget`
--

DROP TABLE IF EXISTS `calbudget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calbudget` (
  `id` int(11) NOT NULL,
  `losegain` varchar(10) DEFAULT NULL,
  `weightchange` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `bmr` float(11,1) DEFAULT NULL,
  `calories` float(11,1) DEFAULT NULL,
  `metric` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `calbudget_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calbudget`
--

LOCK TABLES `calbudget` WRITE;
/*!40000 ALTER TABLE `calbudget` DISABLE KEYS */;
INSERT INTO `calbudget` VALUES (4,NULL,NULL,NULL,NULL,NULL,NULL),(5,'lose',50,100,6649.9,6649.2,1),(6,NULL,NULL,NULL,NULL,NULL,NULL),(7,'lose',5,10,2264.0,2194.0,-1),(8,'gain',40,20,1992.0,1996.4,1);
/*!40000 ALTER TABLE `calbudget` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `ingredients_name` varchar(50) NOT NULL,
  `amount` float(5,2) DEFAULT NULL,
  `measurement` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`ingredients_name`),
  CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`id`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'chorizo sausage',0.75,'pound'),(1,'eggs',4.00,''),(1,'flour tortillas',4.00,''),(1,'green chile pepper',1.00,''),(1,'red onion',0.50,'cup'),(1,'shredded cheddar cheese',1.00,'cup'),(2,'bacon',10.00,'slices'),(2,'dijon mustard',2.00,'tablespoons'),(2,'fresh chives',1.00,'serving'),(2,'maple syrup',2.00,'tablespoons'),(2,'sea scallops',20.00,'large'),(2,'whipping cream',1.00,'cup'),(3,'chicken broth',0.50,'cup'),(3,'cream',0.50,'cup'),(3,'extra-virgin olive oil',3.00,'tablespoons'),(3,'pasta',85.00,'grams'),(3,'shallots',2.00,''),(3,'smoked salmon',6.00,'ounces'),(3,'sun-dried tomatoes',0.50,'cup'),(3,'white wine',0.25,'cup'),(4,'bulk sausage',1.00,'pound'),(4,'butter',1.00,'tablespoon'),(4,'cheese',4.00,'servings'),(4,'egg',1.00,''),(4,'eggs',2.00,''),(4,'half n half',4.00,'servings'),(4,'parsley leaves',1.00,'leaves'),(4,'quick cooking grits',0.50,'cup'),(4,'salt',4.00,'servings'),(4,'salt and pepper',4.00,'servings'),(4,'sour cream',1.00,'tablespoon'),(4,'vinegar',1.00,'tablespoon'),(4,'water',2.00,'cups'),(5,'chicken breasts',4.00,''),(5,'colby jack',2.00,'cups'),(5,'cream of chicken soup',10.00,'oz'),(5,'cream of mushroom soup',10.00,'oz'),(5,'onion',1.00,''),(5,'rice',1.00,'cup'),(5,'salsa',1.00,'cup'),(5,'shredded cheddar cheese',2.00,'cups'),(6,'arborio rice',2.00,'c'),(6,'bay leaf',1.00,''),(6,'canned tomatoes',14.50,'oz'),(6,'chorizo sausage',8.00,'oz'),(6,'dry white wine',0.33,'c'),(6,'extra virgin olive oil',1.00,'serving'),(6,'flat leaf parsley',1.00,'leaf'),(6,'frozen artichoke hearts',0.75,'c'),(6,'garlic cloves',8.00,''),(6,'lemon wedges',1.00,'serving'),(6,'low sodium chicken broth',3.00,'c'),(6,'onion',1.00,''),(6,'peas',0.50,'c'),(6,'red bell pepper',1.00,''),(6,'saffron threads',0.50,'t'),(6,'salt and pepper',1.00,'serving'),(6,'shrimp',1.00,'lb'),(6,'skinless boneless chicken thighs',1.00,'lb'),(7,'cinnamon',2.00,'Tbsp'),(7,'coconut oil',2.00,'Tbsp'),(7,'creamy peanut butter',0.50,'cup'),(7,'honey',2.00,'Tbsp'),(7,'oats',2.00,'cups'),(7,'vanilla extract',2.00,'Tsp'),(8,'avocados',3.00,''),(8,'bell pepper',2.00,'servings'),(8,'bell peppers',2.00,''),(8,'cherry tomatoes',6.00,''),(8,'cilantro',2.00,'sprigs'),(8,'fish fillets',650.00,'g'),(8,'garlic',2.00,'cloves'),(8,'onion',0.50,''),(8,'salt',2.00,'servings'),(8,'tabasco sauce',2.00,'servings'),(8,'tortilla chips',60.00,'g'),(9,'chickens',7.00,'pounds'),(9,'dry white wine',1.00,'cup'),(9,'garlic cloves',10.00,''),(9,'oil cured black olives',24.00,''),(9,'olive oil',0.25,'cup'),(9,'pancetta',0.50,'inch'),(9,'red pepper flakes',0.50,'teaspoon'),(9,'rosemary',1.00,'tablespoon'),(9,'sea salt',1.00,'tablespoon'),(9,'thyme',1.50,'tablespoons'),(10,'avocado',0.50,''),(10,'black olives',10.00,''),(10,'chili pepper',0.25,'tsp'),(10,'cumin',0.50,'tsp'),(10,'extra virgin olive oil',1.00,'tsp'),(10,'fresh coriander leaves',1.00,'leaves'),(10,'ground beef',150.00,'g'),(10,'hard-boiled eggs',2.00,''),(10,'juice of lime',0.50,''),(10,'mayo',1.00,'tbsp'),(10,'onion powder',0.25,'tsp'),(10,'pepper',1.00,'pinch'),(10,'salt',1.00,'pinch'),(10,'tomato',1.00,''),(10,'white wine vinegar',1.00,'tsp'),(10,'yellow bell pepper',0.25,''),(11,'carrots',6.00,'medium'),(11,'cornstarch',4.00,'teaspoons'),(11,'garlic clove',1.00,''),(11,'green onion',1.00,''),(11,'lemon',1.00,'medium'),(11,'lemon juice',2.00,'tablespoons'),(11,'lemon peel',2.00,'tablespoons'),(11,'onion',1.00,'large'),(11,'pepper',0.50,'teaspoon'),(11,'roasting chicken',6.00,'pounds'),(11,'salt',0.50,'teaspoon'),(11,'sugar',0.50,'cup'),(11,'water',1.00,'cup'),(11,'yellow food coloring',1.00,'drops'),(12,'bell pepper',2.00,'servings'),(12,'fresh nutmeg',2.00,'servings'),(12,'green cabbage',500.00,'gr'),(12,'olive oil',2.00,'servings'),(12,'potatoes',800.00,'grams'),(12,'sausages',2.00,''),(12,'sea salt',2.00,'servings'),(12,'white onion',1.00,''),(13,'acorn squash',1.00,''),(13,'breakfast sausage',0.75,'lb'),(13,'eggs',2.00,''),(13,'garlic clove',1.00,''),(13,'salt and pepper',2.00,'servings'),(13,'yellow onion',0.50,''),(15,'avocados',3.00,''),(15,'black olives',8.00,''),(15,'chili flakes',0.50,'teaspoon'),(15,'cucumber',1.00,'large'),(15,'fresh coriander leaves',0.25,'cup'),(15,'grape seed oil',0.25,'cup'),(15,'green onions',4.00,''),(15,'lime',1.00,''),(15,'lime zest',2.00,''),(15,'miso',3.00,'tablespoons'),(15,'orange',1.00,''),(15,'pepper',1.00,'serving'),(15,'prawns',0.50,'lb'),(15,'rice bran oil',1.50,'tablespoons'),(15,'scallops',12.00,'small'),(15,'sea-salt',1.00,'serving'),(15,'shallot',1.00,''),(15,'water',1.00,'teaspoon'),(16,'almond flour',4.00,'cups'),(16,'almond milk',1.25,'cups'),(16,'avocado oil',2.00,'Tbsp'),(16,'baking powder',1.00,'tsp'),(16,'bananas',1.33,'cups'),(16,'eggs',4.00,'large'),(16,'ground cinnamon',1.00,'Tbsp'),(16,'ground nutmeg',0.50,'tsp'),(16,'maple syrup',1.50,'Tbsp'),(16,'sea salt',0.25,'tsp'),(16,'tapioca flour',6.00,'Tbsp'),(16,'vanilla extract',2.00,'tsp'),(17,'andouille sausage',1.00,'pound'),(17,'banana peppers',2.00,'large'),(17,'creole mustard',0.25,'cup'),(17,'dill pickles',3.00,''),(17,'kosher salt',4.00,'servings'),(17,'olive oil',0.25,'cup'),(17,'onions',2.00,'large'),(17,'pork tenderloin',1.50,'pounds'),(17,'thick-cut bacon',4.00,'slices'),(17,'vegetable oil',4.00,'servings'),(18,'kiwis',2.00,''),(18,'lemon pepper seasoning',1.00,'tsp'),(18,'lemon wedges',4.00,''),(18,'lemon zest',1.00,'serving'),(18,'lemonade',0.50,'cup'),(18,'olive oil',2.00,'tbsp'),(18,'salmon fillets',32.00,'oz'),(18,'scallion',1.00,''),(19,'coconut oil',1.50,'teaspoons'),(19,'cooked quinoa',1.00,'cup'),(19,'ground cinnamon',0.50,'teaspoon'),(19,'maple syrup',1.00,'tablespoon'),(19,'pecans',2.00,'tablespoons'),(19,'sea-salt',0.06,'teaspoon'),(23,'balsamic vinegar',0.50,'teaspoon'),(23,'cucumber',150.00,'g'),(23,'extra virgin olive oil',1.00,'teaspoon'),(23,'mint',5.00,'leaves'),(23,'olive oil',2.00,'tablespoons'),(23,'pepper',0.50,'teaspoon'),(23,'salt',0.50,'teaspoon'),(23,'sesame seeds',2.00,'teaspoons'),(23,'sugar',0.50,'cup'),(23,'sun-dried tomatoes',120.00,'g'),(23,'white fish fillet',400.00,'g'),(24,'black pepper',0.50,'teaspoon'),(24,'carrot',4.00,''),(24,'cinnamon',0.50,'teaspoon'),(24,'green peas',0.50,'pound'),(24,'juice of lemon',4.00,''),(24,'lamb',2.00,'pounds'),(24,'lamb stock',4.00,'cups'),(24,'mushroom',1.00,'cup'),(24,'olive oil',4.00,'tablespoons'),(24,'onion',1.00,'small'),(24,'oregano',0.50,'teaspoon'),(24,'parsley',3.00,'teaspoons'),(24,'salt',4.00,'servings'),(25,'banana',1.00,''),(25,'chia seeds',1.00,'Tbsp'),(25,'ground cinnamon',0.25,'tsp'),(25,'ice cubes',5.00,'large'),(25,'maple syrup',2.00,'servings'),(25,'non-dairy milk',1.00,'cup'),(25,'old fashioned oats',0.50,'cup'),(25,'peach',1.00,''),(25,'pecans',0.25,'cup'),(25,'vanilla extract',0.25,'tsp'),(26,'bone-in skin-on chicken thighs',4.00,''),(26,'chicken broth',3.00,'cups'),(26,'garlic powder',0.50,'teaspoon'),(26,'mushrooms',1.00,'cup'),(26,'olive oil',4.00,'tablespoons'),(26,'onion',1.00,''),(26,'oregano',0.50,'teaspoon'),(26,'paprika',1.00,'teaspoon'),(26,'saffron',0.12,'teaspoon'),(26,'salt and pepper',4.00,'servings'),(26,'skin-on chicken drumsticks',4.00,''),(26,'tomatoes',1.00,'cup'),(26,'white rice',1.50,'cup'),(27,'apple cider vinegar',1.00,'cup'),(27,'barbecue sauce',2.00,'cups'),(27,'chili powder',2.00,'tablespoons'),(27,'dijon mustard',1.00,'cup'),(27,'garlic',1.00,'teaspoon'),(27,'ground cumin',1.00,'tablespoon'),(27,'hoisin sauce',1.00,'cup'),(27,'honey',1.00,'cup'),(27,'maple syrup',2.00,'tablespoons'),(27,'pork butt',8.00,'pounds'),(27,'red pepper flakes',0.50,'tablespoon'),(27,'soy sauce',1.00,'teaspoon'),(27,'table salt',2.00,'teaspoons'),(27,'tomato paste',10.00,'ounces'),(27,'vegetable oil',0.50,'cup'),(27,'worcestershire sauce',0.50,'cup'),(27,'yellow onion',1.50,'cups'),(28,'cocoa powder',1.00,'serving'),(28,'coconut',1.00,'serving'),(28,'coconut oil',0.50,'cup'),(28,'cooking oil',1.00,'serving'),(28,'maple syrup',1.00,'serving'),(28,'old fashioned rolled oats',1.00,'serving'),(28,'old-fashioned oats',4.00,'cups'),(28,'sea salt',1.00,'teaspoon'),(28,'sea-salt',1.00,'serving'),(28,'semisweet chocolate chips',1.00,'serving'),(28,'slivered almonds',1.00,'serving'),(28,'unsweetened cocoa powder',0.33,'cup'),(28,'unsweetened shredded coconut',0.67,'cup'),(28,'vanilla extract',1.00,'serving'),(29,'andouille sausage',1.50,'pounds'),(29,'bay leaves',2.00,''),(29,'bell pepper',1.00,''),(29,'canola oil',1.00,'tablespoon'),(29,'celery',5.00,'stalks'),(29,'creole seasoning',6.00,'servings'),(29,'garlic',1.00,'clove'),(29,'onion',1.00,'large'),(29,'red kidney beans',1.00,'pound'),(29,'salt and pepper',6.00,'servings'),(29,'smoked ham hock',1.00,'large'),(29,'tabasco sauce',6.00,'servings'),(29,'thyme leaves',1.00,'teaspoon'),(29,'white rice',6.00,'servings'),(29,'worcestershire sauce',3.00,'dashes'),(31,'almond milk',0.25,'cup'),(31,'baking powder',1.50,'teaspoon'),(31,'baking soda',0.50,'teaspoon'),(31,'bananas',1.00,'cup'),(31,'blanched almond flour',96.00,'g'),(31,'cashew butter',64.00,'g'),(31,'coconut oil',50.00,'g'),(31,'coconut sugar',0.33,'cup'),(31,'flax meal',2.00,'tablespoons'),(31,'ground cinnamon',1.00,'teaspoon'),(31,'oat flour',120.00,'g'),(31,'pecans',0.25,'cup'),(31,'sea salt',0.50,'teaspoon'),(31,'turbinado sugar',1.00,'tablespoon'),(31,'vanilla extract',1.00,'teaspoon'),(33,'barbecue sauce',1.50,'cups'),(33,'black pepper',0.50,'teaspoon'),(33,'cayenne pepper',0.50,'teaspoon'),(33,'dry mustard',1.00,'tablespoon'),(33,'kosher salt',2.50,'tablespoons'),(33,'paprika',1.00,'tablespoon'),(33,'spareribs',8.00,'pounds'),(34,'almond butter',1.00,'tablespoon'),(34,'chia seeds',0.25,'cup'),(34,'coffee',0.50,'cup'),(34,'full fat coconut milk',0.50,'cup'),(34,'maple syrup',2.00,'tablespoons'),(34,'unsweetened cocoa powder',1.00,'tablespoon'),(34,'vanilla extract',1.00,'teaspoon'),(35,'butternut squash',1.00,''),(35,'canned chickpeas',1.00,'can'),(35,'canned tomatoes',1.00,'can'),(35,'chilli flakes',9.00,'servings'),(35,'coconut oil',1.00,'tbsp'),(35,'garlic',2.00,'cloves'),(35,'ground paprika',1.00,'tsp'),(35,'kale',3.00,''),(35,'onion',1.00,'small'),(35,'oregano',1.00,'tsp'),(35,'salt and pepper',3.00,'servings'),(35,'turmeric',0.50,'tsp'),(35,'water',2.00,'cups'),(36,'cilantro',2.00,'Bunches'),(36,'coriander seeds',2.00,'Teaspoons'),(36,'cumin seeds',1.00,'Teaspoon'),(36,'fresh ginger',2.00,'Teaspoons'),(36,'garam masala',1.00,'Tablespoon'),(36,'garlic cloves',2.00,''),(36,'grapeseed oil',0.25,'cup'),(36,'red lentils',3.00,'cups'),(36,'sea-salt',1.00,'Tablespoon'),(36,'serrano chilis',2.00,''),(36,'tomatoes',1.00,'cup'),(36,'turmeric',3.00,'Tablespoons'),(36,'vegetable stock cubes',2.00,''),(36,'water',12.00,'cups'),(36,'white onion',0.50,''),(37,'gluten free flour',1.50,'cups'),(37,'ground cinnamon',3.00,'teaspoons'),(37,'kosher salt',0.25,'teaspoon'),(37,'light brown sugar',1.50,'cups'),(37,'old fashioned oats',3.00,'cups'),(37,'olive oil',0.75,'cup'),(37,'peaches',4.00,'cups'),(37,'pecans',1.00,'cup'),(37,'vanilla extract',2.00,'teaspoons'),(37,'water',2.00,'tablespoons'),(38,'bay leaf',1.00,''),(38,'chestnuts',0.25,'cup'),(38,'garlic',1.00,'clove'),(38,'lentils',1.50,'cups'),(38,'olive oil',4.00,'servings'),(38,'onion',1.00,''),(38,'potato',1.00,''),(38,'roma tomatoes',0.50,'cup'),(38,'salt and pepper',4.00,'servings'),(39,'brown lentils',1.00,'cup'),(39,'canned tomatoes',14.50,'oz'),(39,'carrot',0.50,'cup'),(39,'fresh cilantro',0.50,'cup'),(39,'fresh ginger',2.00,'tsp'),(39,'garlic',1.00,'Tbsp'),(39,'ground cinnamon',1.00,'tsp'),(39,'ground coriander',1.00,'tsp'),(39,'ground cumin',2.00,'tsp'),(39,'olive oil',3.00,'Tbsp'),(39,'paprika',1.00,'tsp'),(39,'salt',4.00,'servings'),(39,'sweet potato',16.00,'oz'),(39,'turmeric',1.00,'tsp'),(39,'vegetable broth',6.00,'cups'),(39,'yellow onion',1.50,'cups'),(40,'agave nectar',1.00,'tablespoon'),(40,'cacao nibs',1.00,'tablespoon'),(40,'coconut milk',2.00,'tablespoons'),(40,'goji berries',0.25,'cup'),(40,'peanut butter',1.00,'tablespoon'),(40,'steel cut oats',1.00,'cup'),(40,'unsweetened shredded coconut',1.00,'tablespoon'),(40,'water',1.50,'cups'),(41,'agar',1.00,'teaspoon'),(41,'agave',0.25,'teaspoon'),(41,'agave nectar',0.25,'cup'),(41,'almonds',1.50,'cups'),(41,'cinnamon',0.50,'teaspoon'),(41,'cocoa powder',3.00,'tablespoons'),(41,'coconut oil',0.25,''),(41,'creamy peanut butter',0.50,'cup'),(41,'dates',0.50,'cups'),(41,'extra firm tofu',1.00,''),(41,'maple syrup',0.25,'cup'),(41,'peanut butter',0.50,'cup'),(41,'soy milk',0.50,'cup'),(41,'vanilla extract',1.00,'teaspoon'),(41,'water',1.00,'cup'),(43,'bananas',2.00,''),(43,'cardamom powder',1.00,'pinch'),(43,'orange juice',0.50,'cup'),(44,'canned chickpeas',115.50,'ounce'),(44,'carrots',4.00,'ounces'),(44,'curry paste',1.00,''),(44,'ground cumin',0.25,'teaspoon'),(44,'harissa',1.00,'tablespoon'),(44,'kosher salt',0.75,'teaspoon'),(44,'lemon juice',0.25,'cup'),(44,'olive oil',2.00,'tablespoons'),(44,'sunflower seeds',9.00,'servings'),(44,'tahini',0.33,'cup'),(45,'baking powder',1.00,'small pinch'),(45,'chillies',2.00,'medium'),(45,'cinnamon powder',1.00,'teaspoon'),(45,'coriander',0.25,'cup'),(45,'cumin seeds',2.00,'teaspoons'),(45,'curry leaves',6.00,''),(45,'garlic',1.00,'tablespoon'),(45,'lemon juice',1.00,'tablespoon'),(45,'mung beans',1.50,'cups'),(45,'mustard seeds',1.00,'teaspoon'),(45,'salt',4.00,'servings'),(45,'sugar',4.00,'servings'),(45,'sunflower oil',1.00,'tablespoon'),(45,'tomato',1.00,'medium'),(45,'turmeric',0.50,'teaspoon'),(46,'broccoli',16.00,'ounces'),(46,'butter',0.50,'cup'),(46,'cooked lasagna noodles',9.00,''),(46,'diced ham',2.00,'cups'),(46,'flour',0.33,'cup'),(46,'green onions',0.25,'cup'),(46,'hard cooked eggs',4.00,''),(46,'lemon juice',1.00,'teaspoon'),(46,'milk',3.00,'cups'),(46,'parmesan cheese',0.50,'cup'),(46,'pepper',1.00,'Dash'),(46,'pepper sauce',0.25,'teaspoon'),(46,'salt',0.25,'teaspoon'),(46,'shredded cheddar cheese',12.00,'ounces'),(47,'basil',1.00,'tablespoon'),(47,'bulk sausage',1.00,'pound'),(47,'cheese cake mix',5.00,'ounces'),(47,'garlic',3.00,'cloves'),(47,'onion',1.00,''),(47,'oregano',1.00,'teaspoon'),(47,'pepperoni',5.00,'ounces'),(47,'pizza dough',1.00,'ball'),(47,'pizza sauce',1.00,'jar'),(48,'black pepper',2.00,'teaspoons'),(48,'brown sugar',0.25,'cup'),(48,'canola oil',0.50,'cup'),(48,'chili powder',1.00,'tablespoon'),(48,'corn tortillas',12.00,''),(48,'garlic',1.00,'tablespoon'),(48,'green bell pepper',1.00,'large'),(48,'ground cumin seed',2.00,'teaspoons'),(48,'lime juice',0.50,'cup'),(48,'red bell pepper',1.00,'large'),(48,'skirt steak',2.00,'pounds'),(48,'soy sauce',0.50,'cup'),(48,'yellow bell pepper',1.00,'large'),(48,'yellow onion',1.00,''),(49,'black pepper',1.00,'teaspoon'),(49,'canadian bacon',8.00,'oz'),(49,'cottage cheese',12.00,'oz'),(49,'eggs',6.00,''),(49,'onion',1.00,'medium'),(49,'salt',1.00,'teaspoon'),(49,'shredded cheddar cheese',2.00,'cups'),(49,'swiss cheese',1.00,'cup'),(49,'tater tots',32.00,'oz'),(50,'breadcrumbs',1.00,'cup'),(50,'cornflour',0.50,'Tablespoon'),(50,'egg',1.00,''),(50,'green apple',2.00,''),(50,'mayonnaise',4.00,'servings'),(50,'olive oil',0.33,'cup'),(50,'salad mix',1.00,'Packet'),(50,'sirloin steaks',4.00,''),(50,'wholegrain mustard',4.00,'servings'),(50,'wine',0.50,'Tablespoon'),(51,'curry powder',2.00,'tsp'),(51,'extra virgin olive oil',1.00,'tablespoon'),(51,'fresh mint',1.00,'tablespoon'),(51,'garam masala',2.00,'tsp'),(51,'garlic',0.50,'teaspoon'),(51,'ginger',2.00,'tablespoons'),(51,'ground lamb',1.50,'pounds'),(51,'ground turkey',0.50,'pound'),(51,'kosher salt',0.50,'teaspoon'),(51,'lemon zest',1.00,''),(51,'low fat greek yogurt',14.00,'oz'),(51,'olive oil',1.00,'tablespoon'),(51,'pitas',4.00,'servings'),(51,'Salt & Pepper',1.00,'teaspoon'),(52,'cinnamon',3.00,'pinches'),(52,'cottage cheese',100.00,'g'),(52,'egg',1.00,'large'),(52,'rapeseed oil',0.50,'tsp'),(52,'skimmed milk',1.00,'tbsp'),(52,'strawberry',175.00,'g'),(53,'baking potatoes',4.00,'large'),(53,'butter',0.50,'cup'),(53,'dry white wine',0.50,'cup'),(53,'flour',3.00,'tbsp'),(53,'fresh dill',2.00,'tbsp'),(53,'fresh mushrooms',1.00,'lb'),(53,'fresh parsley',0.25,'cup'),(53,'kosher salt',4.00,'servings'),(53,'olive oil',2.00,'tbsp'),(53,'salt and pepper',4.00,'servings'),(53,'shallots',1.00,'cup'),(53,'sour cream',0.50,'cup'),(53,'sweet paprika',1.00,'tbsp'),(53,'vegetable broth',1.00,'cup'),(54,'almonds',3.00,'servings'),(54,'avocado',1.00,''),(54,'black pepper',0.25,'tsp'),(54,'blueberries',1.00,'cup'),(54,'coconut',3.00,'servings'),(54,'collard leaves',2.00,''),(54,'cooked quinoa',1.00,'cup'),(54,'fat free greek yogurt',3.00,'servings'),(54,'fresh ginger',2.00,'tbsp'),(54,'fresh mint',0.25,'cup'),(54,'fresh parsley',0.25,'cup'),(54,'granny smith apple',1.00,''),(54,'jalapeno pepper',1.00,''),(54,'juice of lime',1.00,''),(54,'liquid honey',1.00,'tbsp'),(54,'low fat cottage cheese',3.00,'servings'),(54,'mango',1.00,'cup'),(54,'raspberries',1.00,'cup'),(54,'salt',0.50,'tsp'),(54,'vinegar',2.00,'tbsp'),(55,'butter',4.00,'tbsp'),(55,'dijon mustard',1.50,'tbsp'),(55,'flour',4.00,'tbsp'),(55,'fresh cilantro',1.00,'serving'),(55,'half and half',2.00,'cups'),(55,'jalapeno',1.00,''),(55,'penne',450.00,'g'),(55,'red bell pepper',0.50,''),(55,'red onion',0.25,''),(55,'roma tomato',1.00,''),(55,'salsa',4.00,'tbsp'),(55,'salt and pepper',1.00,'serving'),(55,'shredded cheddar cheese',1.50,'cup'),(56,'cayenne pepper',0.12,'teaspoon'),(56,'ground cinnamon',2.00,'teaspoons'),(56,'kosher salt',1.00,'teaspoon'),(56,'maple syrup',0.25,'cup'),(56,'orange zest',2.00,'teaspoons'),(56,'pecans',2.00,'cups'),(56,'roasted cashews',2.00,'cups'),(56,'unsalted butter',3.00,'tablespoons'),(57,'berries',1.00,'halves'),(57,'cherries',0.50,'cup'),(57,'ground cinnamon',0.25,'teaspoon'),(57,'kosher salt',0.50,'teaspoon'),(57,'maple syrup',1.00,'tablespoon'),(57,'milk',3.00,'cups'),(57,'old fashioned rolled oats',1.00,'cup'),(57,'pecan',1.00,'cup'),(57,'quinoa',0.50,'cup'),(57,'vanilla extract',1.00,'teaspoon'),(58,'black pepper',0.50,'teaspoon'),(58,'cherry tomatoes',1.00,'pint'),(58,'dry white wine',0.50,'cup'),(58,'eggplant',6.00,'cups'),(58,'fat-free less-sodium chicken broth',5.00,'cups'),(58,'fresh basil',0.25,'cup'),(58,'garlic',2.00,'teaspoons'),(58,'goat cheese',2.00,'ounces'),(58,'olive oil',3.00,'tablespoons'),(58,'onion',1.50,'cups'),(58,'pearl barley',1.00,'cup'),(58,'pine nuts',0.25,'cup'),(58,'salt',0.25,'teaspoon'),(58,'water',2.00,'cups'),(60,'asparagus',1.00,''),(60,'bell pepper',1.00,'serving'),(60,'feta cheese',0.33,'c'),(60,'fresh mint',1.00,'T'),(60,'greens',5.00,'oz'),(60,'lemon juice',1.00,'T'),(60,'olive oil',6.00,'T'),(60,'oranges',2.00,''),(60,'pepitas',0.25,'c'),(60,'quinoa',2.00,'c'),(60,'red grapefruit',2.00,''),(60,'salt',0.50,'t'),(60,'shallot',2.00,''),(61,'eggplant',1.00,'large'),(61,'feta cheese',4.00,'ounces'),(61,'fresh basil',0.50,'cup'),(61,'garlic cloves',5.00,''),(61,'green bell peppers',2.00,''),(61,'olive oil',3.00,'tablespoons'),(61,'onion',1.00,''),(61,'red wine vinegar',2.00,'tablespoons'),(61,'tomatoes',2.00,'large'),(61,'zucchini',1.00,'large'),(62,'black beans',1.00,'serving'),(62,'cilantro',2.00,'tablespoons'),(62,'eggs',6.00,''),(62,'jalapenos',2.00,''),(62,'oil',1.50,'tablespoon'),(62,'onion',0.50,'small'),(62,'salt and pepper',1.00,'serving'),(62,'shredded mexican cheese blend',0.50,'cup'),(62,'tortilla chips',1.00,'cup'),(63,'bell pepper',6.00,'servings'),(63,'butter',4.00,'Tbsp'),(63,'dry mustard',0.75,'tsp'),(63,'eggs',2.00,''),(63,'elbow macaroni',0.50,'pound'),(63,'evaporated milk',6.00,'oz'),(63,'hot sauce',0.50,'tsp'),(63,'kosher salt',1.00,'tsp'),(63,'sharp cheddar',10.00,'oz'),(65,'bananas',0.75,'cup'),(65,'dark chocolate bar',1.00,''),(65,'egg',1.00,''),(65,'ground cinnamon',0.50,'teaspoon'),(65,'honey',75.00,'g'),(65,'old fashioned rolled oats',2.50,'cups'),(65,'peanut butter',0.50,'cup'),(65,'salt',0.25,'teaspoon'),(65,'vanilla extract',1.00,'teaspoon'),(66,'canola oil',1.00,'tablespoon'),(66,'carrot',1.00,'medium'),(66,'cooked rice',2.00,'cups'),(66,'corn',0.50,'cup'),(66,'edamame',0.50,'cup'),(66,'eggs',2.00,''),(66,'extra firm tofu',12.00,'ounce'),(66,'garlic',2.00,'cloves'),(66,'ground pepper',2.00,'servings'),(66,'sesame oil',2.00,'tablespoons'),(66,'soy sauce',2.00,'tablespoons'),(67,'bell pepper',3.00,'servings'),(67,'eggplant',1.00,'small'),(67,'garlic salt',0.25,'teaspoon'),(67,'italian cheese',2.00,'cups'),(67,'italian seasoning',1.50,'teaspoons'),(67,'lasagna noodles',8.00,''),(67,'marinara sauce',24.00,'oz'),(67,'olive oil',2.00,'tablespoons'),(67,'onion',1.00,'large'),(67,'red pepper flakes',1.00,'teaspoon'),(67,'salt',3.00,'servings'),(68,'avocado',4.00,'servings'),(68,'black beans',4.00,'servings'),(68,'chipotle peppers in adobo',3.00,''),(68,'cilantro',1.00,'handful'),(68,'cumin',1.00,'tsp'),(68,'extra firm tofu',1.00,'package'),(68,'garlic',3.00,'cloves'),(68,'garlic powder',1.00,'tsp'),(68,'jalapeno',1.00,''),(68,'kale',4.00,'servings'),(68,'lime juice',2.00,'tbsp'),(68,'liquid stevia',10.00,'g'),(68,'nutritional yeast',1.00,'tbsp'),(68,'raw cashews',0.67,'cup'),(68,'russet potato',1.00,''),(68,'Salt & Pepper',4.00,'servings'),(68,'sea salt',0.50,'tsp'),(68,'tomato',1.00,''),(68,'turmeric',1.00,'tsp'),(68,'water',0.25,'cup'),(68,'white onion',1.00,'small'),(70,'canola oil',2.00,'T'),(70,'cilantro',0.33,'c'),(70,'coconut milk',1.00,'c'),(70,'fresh ginger',1.00,'T'),(70,'garam masala',1.00,'t'),(70,'garlic cloves',4.00,''),(70,'lime juice',1.00,'T'),(70,'onion',1.00,''),(70,'plum tomatoes',3.00,''),(70,'red lentils',1.25,'c'),(70,'salt',0.75,'t'),(70,'water',3.00,'c'),(72,'avocado',0.50,''),(72,'broccoli',1.00,'cup'),(72,'cherry tomatoes',4.00,'servings'),(72,'clementine',1.00,''),(72,'kale',2.00,'cups'),(72,'quinoa',2.00,'cups'),(72,'salt and pepper',4.00,'servings'),(72,'sprouts',1.00,'cup'),(72,'stock',2.00,'cups'),(73,'brown sugar',1.00,'tbsp'),(73,'coconut oil',2.00,'tablespoons'),(73,'fresh cilantro',0.50,'cup'),(73,'green onions',1.00,'bunch'),(73,'ground allspice',0.50,'tsp'),(73,'ground ginger',2.00,'tsp'),(73,'jalapenos',4.00,''),(73,'mat beans',1.00,'pound'),(73,'sea-salt',2.00,'tsp'),(73,'sweet potatoes',4.00,'cups'),(73,'thyme',0.50,'tsp'),(73,'vegetable broth',8.00,'cups'),(73,'yellow onion',1.00,'');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_dislike`
--

DROP TABLE IF EXISTS `like_dislike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_dislike` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `like_dislike` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`recipe_id`),
  KEY `recipe_id` (`recipe_id`),
  CONSTRAINT `like_dislike_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`),
  CONSTRAINT `like_dislike_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_dislike`
--

LOCK TABLES `like_dislike` WRITE;
/*!40000 ALTER TABLE `like_dislike` DISABLE KEYS */;
INSERT INTO `like_dislike` VALUES (5,633754,0);
/*!40000 ALTER TABLE `like_dislike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `loggedIn` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (4,'1','2',0),(5,'ian','admin',1),(6,'happy','funtime',0),(7,'admin','admin',0),(8,'3','4',0);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_restrictions`
--

DROP TABLE IF EXISTS `recipe_restrictions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_restrictions` (
  `id` int(11) NOT NULL,
  `vegetarian` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `glutenFree` tinyint(1) NOT NULL,
  `dairyFree` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `recipe_restrictions_ibfk_1` FOREIGN KEY (`id`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_restrictions`
--

LOCK TABLES `recipe_restrictions` WRITE;
/*!40000 ALTER TABLE `recipe_restrictions` DISABLE KEYS */;
INSERT INTO `recipe_restrictions` VALUES (1,1,0,0,0),(2,0,0,1,0),(3,0,0,0,0),(4,0,0,1,0),(5,0,0,1,0),(6,0,0,1,1),(7,1,0,1,1),(8,0,0,1,1),(9,0,0,1,1),(10,0,0,1,1),(11,0,0,1,1),(12,0,0,1,1),(13,0,0,1,1),(15,0,0,1,1),(16,0,0,1,1),(17,0,0,1,1),(18,0,0,1,1),(19,1,1,1,1),(23,0,0,1,1),(24,0,0,1,1),(25,0,0,1,1),(26,0,0,1,1),(27,0,0,1,1),(28,0,0,1,1),(29,0,0,1,1),(31,0,0,1,1),(33,0,0,1,1),(34,1,1,1,1),(35,1,1,1,1),(36,1,1,1,1),(37,1,1,1,1),(38,1,1,1,1),(39,1,1,1,1),(40,1,1,1,1),(41,1,1,1,1),(43,1,1,1,1),(44,1,1,1,1),(45,1,1,1,1),(46,0,0,0,0),(47,0,0,0,0),(48,0,0,1,1),(49,0,0,1,0),(50,0,0,0,1),(51,0,0,0,0),(52,1,0,1,0),(53,1,0,0,0),(54,1,0,1,0),(55,1,0,0,0),(56,1,0,1,0),(57,1,0,1,0),(58,1,0,0,0),(60,1,0,1,0),(61,1,0,1,0),(62,1,0,1,0),(63,1,0,0,0),(65,1,0,1,1),(66,1,0,1,1),(67,1,0,0,0),(68,1,1,1,1),(70,1,1,1,1),(72,1,1,1,1),(73,1,1,1,1);
/*!40000 ALTER TABLE `recipe_restrictions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipes_name` varchar(150) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,'Chorizo Breakfast Burritos',665,'https://spoonacular.com/chorizo-breakfast-burritos-472189','https://spoonacular.com/recipeImages/472189-240x150.jpg',472189),(2,'Bacon Scallops',570,'https://spoonacular.com/bacon-scallops-633324','https://spoonacular.com/recipeImages/633324-240x150.jpg',633324),(3,'Artisan Farfalle Pasta With Smoked Salmon and Cream Sauce',765,'https://spoonacular.com/artisan-farfalle-pasta-with-smoked-salmon-and-cream-sauce-632778','https://spoonacular.com/recipeImages/632778-240x150.jpg',632778),(4,'Breakfast in a Cup',610,'https://spoonacular.com/breakfast-in-a-cup-290903','https://spoonacular.com/recipeImages/290903-240x150.jpg',290903),(5,'Mexican Casserole',701,'https://spoonacular.com/mexican-casserole-715438','https://spoonacular.com/recipeImages/715438-240x150.jpg',715438),(6,'Dutch Oven Paella',689,'https://spoonacular.com/dutch-oven-paella-631747','https://spoonacular.com/recipeImages/631747-240x150.jpg',631747),(7,'Staying Healthy: Why You Should Eat Breakfast',449,'https://spoonacular.com/staying-healthy-why-you-should-eat-breakfast-610906','https://spoonacular.com/recipeImages/610906-240x150.jpg',610906),(8,'Crispy-Crowned Guacamole Fish Fillets',1026,'https://spoonacular.com/crispy-crowned-guacamole-fish-fillets-157399','https://spoonacular.com/recipeImages/157399-240x150.jpg',157399),(9,'Roast Chicken with Pancetta and Olives',964,'https://spoonacular.com/roast-chicken-with-pancetta-and-olives-153925','https://spoonacular.com/recipeImages/153925-240x150.jpg',153925),(10,'Taco Wannabe Mexican Breakfast Bowl',930,'https://spoonacular.com/taco-wannabe-mexican-breakfast-bowl-551103','https://spoonacular.com/recipeImages/551103-240x150.jpg',551103),(11,'Roasted Chicken with Lemon Sauce',819,'https://spoonacular.com/roasted-chicken-with-lemon-sauce-433234','https://spoonacular.com/recipeImages/433234-240x150.jpg',433234),(12,'Sausages with Green Cabbage Mash',500,'https://spoonacular.com/sausages-with-green-cabbage-mash-645422','https://spoonacular.com/recipeImages/645422-240x150.jpg',645422),(13,'5 Ingredient Breakfast Stuffed Acorn Squash',679,'https://spoonacular.com/5-ingredient-breakfast-stuffed-acorn-squash-509616','https://spoonacular.com/recipeImages/509616-240x150.jpg',509616),(15,'Chilled Avocado and Cucumber Soup With Prawn and Scallop Salsa',612,'https://spoonacular.com/chilled-avocado-and-cucumber-soup-with-prawn-and-scallop-salsa-638588','https://spoonacular.com/recipeImages/638588-240x150.jpg',638588),(16,'Paleo Banana Sheet Pan Pancakes',956,'https://spoonacular.com/paleo-banana-sheet-pan-pancakes-1160557','https://spoonacular.com/recipeImages/1160557-240x150.jpg',1160557),(17,'Kebabs with Pork Three Ways',1035,'https://spoonacular.com/kebabs-with-pork-three-ways-746633','https://spoonacular.com/recipeImages/746633-240x150.jpg',746633),(18,'Sockeye Salmon on Kiwi & Lemon Puree',434,'https://spoonacular.com/sockeye-salmon-on-kiwi-lemon-puree-660490','https://spoonacular.com/recipeImages/660490-240x150.jpg',660490),(19,'Cinnamon Toast Breakfast Quinoa',468,'https://spoonacular.com/cinnamon-toast-breakfast-quinoa-1041883','https://spoonacular.com/recipeImages/1041883-240x150.jpg',1041883),(23,'Grilled Fish With Sun Dried Tomato Relish',705,'https://spoonacular.com/grilled-fish-with-sun-dried-tomato-relish-645714','https://spoonacular.com/recipeImages/645714-240x150.jpg',645714),(24,'Lamb Tagine Stew',880,'https://spoonacular.com/lamb-tagine-stew-649248','https://spoonacular.com/recipeImages/649248-240x150.jpg',649248),(25,'Vegan Peach Pecan Breakfast Smoothie',383,'https://spoonacular.com/vegan-peach-pecan-breakfast-smoothie-573693','https://spoonacular.com/recipeImages/573693-240x150.jpg',573693),(26,'Chicken Paprika with Rice',849,'https://spoonacular.com/chicken-paprika-with-rice-898131','https://spoonacular.com/recipeImages/898131-240x150.jpg',898131),(27,'South Carolina Style Pulled Pork',920,'https://spoonacular.com/south-carolina-style-pulled-pork-660680','https://spoonacular.com/recipeImages/660680-240x150.jpg',660680),(28,'The Best Healthy Chocolate Granola',771,'https://spoonacular.com/the-best-healthy-chocolate-granola-1076046','https://spoonacular.com/recipeImages/1076046-240x150.jpg',1076046),(29,'New Orleans Red Beans and Rice with Andouille Sausage',770,'https://spoonacular.com/new-orleans-red-beans-and-rice-with-andouille-sausage-653055','https://spoonacular.com/recipeImages/653055-240x150.jpg',653055),(31,'Vegan Cinnamon Swirl Banana Bread (Gluten Free + Refined Sugar Free)',218,'https://spoonacular.com/vegan-cinnamon-swirl-banana-bread-gluten-free-+-refined-sugar-free-1082360','https://spoonacular.com/recipeImages/1082360-240x150.jpg',1082360),(33,'Best-Ever Barbecued Ribs',979,'https://spoonacular.com/best-ever-barbecued-ribs-188348','https://spoonacular.com/recipeImages/188348-240x150.jpg',188348),(34,'Overnight Chocolate Coffee Chia Breakfast Pudding',330,'https://spoonacular.com/overnight-chocolate-coffee-chia-breakfast-pudding-509360','https://spoonacular.com/recipeImages/509360-240x150.jpg',509360),(35,'Clean eating butternut squash stew',390,'https://spoonacular.com/clean-eating-butternut-squash-stew-1062974','https://spoonacular.com/recipeImages/1062974-240x150.jpg',1062974),(36,'Indian Spiced Red Lentil Soup',217,'https://spoonacular.com/indian-spiced-red-lentil-soup-631752','https://spoonacular.com/recipeImages/631752-240x150.jpg',631752),(37,'Peach Breakfast Bars',365,'https://spoonacular.com/peach-breakfast-bars-675329','https://spoonacular.com/recipeImages/675329-240x150.jpg',675329),(38,'Delicious Creamy Lentils and Chestnuts Soup',413,'https://spoonacular.com/delicious-creamy-lentils-and-chestnuts-soup-641387','https://spoonacular.com/recipeImages/641387-240x150.jpg',641387),(39,'Moroccan Sweet Potato and Lentil Soup',455,'https://spoonacular.com/moroccan-sweet-potato-and-lentil-soup-822526','https://spoonacular.com/recipeImages/822526-240x150.jpg',822526),(40,'Tropical Steel Cut Oatmeal',463,'https://spoonacular.com/tropical-steel-cut-oatmeal-663867','https://spoonacular.com/recipeImages/663867-240x150.jpg',663867),(41,'Vegan Peanut Butter Chocolate Cheesecake',554,'https://spoonacular.com/vegan-peanut-butter-chocolate-cheesecake-664471','https://spoonacular.com/recipeImages/664471-240x150.jpg',664471),(43,'Luscious Orange Cardamom Smoothie',133,'https://spoonacular.com/luscious-orange-cardamom-smoothie-650485','https://spoonacular.com/recipeImages/650485-240x150.jpg',650485),(44,'Spicy Carrot Hummus',415,'https://spoonacular.com/spicy-carrot-hummus-871974','https://spoonacular.com/recipeImages/871974-240x150.jpg',871974),(45,'Gujarati Dry Mung Bean Curry',417,'https://spoonacular.com/gujarati-dry-mung-bean-curry-646043','https://spoonacular.com/recipeImages/646043-240x150.jpg',646043),(46,'Easter Brunch Lasagna',379,'https://spoonacular.com/easter-brunch-lasagna-379135','https://spoonacular.com/recipeImages/379135-240x150.jpg',379135),(47,'Sausage Calzone',914,'https://spoonacular.com/sausage-calzone-659358','https://spoonacular.com/recipeImages/659358-240x150.jpg',659358),(48,'Grilled Skirt Steak Fajitas',901,'https://spoonacular.com/grilled-skirt-steak-fajitas-195684','https://spoonacular.com/recipeImages/195684-240x150.jpg',195684),(49,'Tater Tot Breakfast Casserole',674,'https://spoonacular.com/tater-tot-breakfast-casserole-999940','https://spoonacular.com/recipeImages/999940-240x150.jpg',999940),(50,'Pork Schnitzel And Apple Salad',670,'https://spoonacular.com/pork-schnitzel-and-apple-salad-656817','https://spoonacular.com/recipeImages/656817-240x150.jpg',656817),(51,'Spiced Lamb Meatballs With Lemon Mint Yogurt Sauce',850,'https://spoonacular.com/spiced-lamb-meatballs-with-lemon-mint-yogurt-sauce-660961','https://spoonacular.com/recipeImages/660961-240x150.jpg',660961),(52,'Berry omelette',258,'https://spoonacular.com/berry-omelette-504538','https://spoonacular.com/recipeImages/504538-240x150.jpg',504538),(53,'Baked Potatoes with Creamy Mushroom Ragout',734,'https://spoonacular.com/baked-potatoes-with-creamy-mushroom-ragout-633744','https://spoonacular.com/recipeImages/633744-240x150.jpg',633744),(54,'Salad for breakfast? Oh yeah! Breakfast Quinoa Salad',643,'https://spoonacular.com/salad-for-breakfast-oh-yeah-breakfast-quinoa-salad-550998','https://spoonacular.com/recipeImages/550998-240x150.jpg',550998),(55,'Cheesy Mexican Penne',596,'https://spoonacular.com/cheesy-mexican-penne-637664','https://spoonacular.com/recipeImages/637664-240x150.jpg',637664),(56,'Slow-Cooker Spiced Nuts',869,'https://spoonacular.com/slow-cooker-spiced-nuts-770929','https://spoonacular.com/recipeImages/770929-240x150.jpg',770929),(57,'Pecan Milk Breakfast Porridge',465,'https://spoonacular.com/pecan-milk-breakfast-porridge-906855','https://spoonacular.com/recipeImages/906855-240x150.jpg',906855),(58,'Barley Risotto with Eggplant and Tomatoes',478,'https://spoonacular.com/barley-risotto-with-eggplant-and-tomatoes-23900','https://spoonacular.com/recipeImages/23900-240x150.jpg',23900),(60,'Citrus and Asparagus Salad',659,'https://spoonacular.com/citrus-and-asparagus-salad-639510','https://spoonacular.com/recipeImages/639510-240x150.jpg',639510),(61,'Baked Ratatouille',1028,'https://spoonacular.com/baked-ratatouille-633754','https://spoonacular.com/recipeImages/633754-240x150.jpg',633754),(62,'Easy Breakfast Migas',365,'https://spoonacular.com/easy-breakfast-migas-1100038','https://spoonacular.com/recipeImages/1100038-240x150.jpg',1100038),(63,'Stovetop Mac and Cheese',482,'https://spoonacular.com/stovetop-mac-and-cheese-510089','https://spoonacular.com/recipeImages/510089-240x150.jpg',510089),(65,'Banana Oatmeal Breakfast Cookies',526,'https://spoonacular.com/banana-oatmeal-breakfast-cookies-960757','https://spoonacular.com/recipeImages/960757-240x150.jpg',960757),(66,'Vegetable Fried Rice with Tofu',660,'https://spoonacular.com/vegetable-fried-rice-with-tofu-555419','https://spoonacular.com/recipeImages/555419-240x150.jpg',555419),(67,'Roll Up Eggplant Lasagna',739,'https://spoonacular.com/roll-up-eggplant-lasagna-658743','https://spoonacular.com/recipeImages/658743-240x150.jpg',658743),(68,'Vegan Breakfast Burrito Bowl with Chipotle Sauce',531,'https://spoonacular.com/vegan-breakfast-burrito-bowl-with-chipotle-sauce-940395','https://spoonacular.com/recipeImages/940395-240x150.jpg',940395),(70,'Indian Lentil Dahl',400,'https://spoonacular.com/indian-lentil-dahl-647830','https://spoonacular.com/recipeImages/647830-240x150.jpg',647830),(72,'Instant Pot Quinoa Grain Bowl',420,'https://spoonacular.com/instant-pot-quinoa-grain-bowl-982371','https://spoonacular.com/recipeImages/982371-240x150.jpg',982371),(73,'Caribbean black bean and sweet potato soup',403,'https://spoonacular.com/caribbean-black-bean-and-sweet-potato-soup-637099','https://spoonacular.com/recipeImages/637099-240x150.jpg',637099);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restrictions`
--

DROP TABLE IF EXISTS `restrictions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restrictions` (
  `id` int(11) NOT NULL,
  `vegetarian` tinyint(4) DEFAULT NULL,
  `vegan` tinyint(4) DEFAULT NULL,
  `glutenFree` tinyint(4) DEFAULT NULL,
  `dairyFree` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `restrictions_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restrictions`
--

LOCK TABLES `restrictions` WRITE;
/*!40000 ALTER TABLE `restrictions` DISABLE KEYS */;
INSERT INTO `restrictions` VALUES (4,NULL,NULL,NULL,0),(5,1,1,0,1),(6,NULL,NULL,NULL,NULL),(7,1,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `restrictions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-21 20:23:08
