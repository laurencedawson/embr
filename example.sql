-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2011 at 12:20 AM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `datet` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shorturl` varchar(100) NOT NULL,
  `qr` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  `summary` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `datet`, `shorturl`, `qr`, `views`, `summary`) VALUES
(0, 'Test Post of New Blog', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p> Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-03-27 17:03:50', '', '', 63, ''),
(2, 'Final Test Post', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate.</p>', '2011-03-29 20:22:13', '', '', 0, ''),
(1, 'Second Post', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p> Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes</p>', '2011-03-27 18:02:41', '', '', 464, ''),
(3, 'Another Test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p> Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-02 18:13:48', '', '', 0, ''),
(4, 'Yet Another Test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p> Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-02 18:13:48', '', '', 0, ''),
(5, 'Endless Scroll Test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p> Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-02 18:14:20', '', '', 0, ''),
(6, 'Another ES Test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem. Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-02 18:14:20', '', '', 0, ''),
(7, 'Test One', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem. Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-04 15:39:34', '', '', 0, ''),
(8, 'Test Two', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem. Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-04 15:39:34', '', '', 0, ''),
(9, 'Test Three', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem. Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-04 15:40:03', '', '', 0, ''),
(10, 'Test Four', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem. Pellentesque a enim tellus. Suspendisse laoreet feugiat quam, ut tempor ipsum lobortis eget. Donec gravida, velit sit amet pretium viverra, nulla est ullamcorper neque, eu pulvinar est lectus sed enim. Proin condimentum nunc ac ipsum gravida scelerisque. Duis sit amet arcu arcu. Aliquam rhoncus interdum tempus. Integer vel dui ut justo tincidunt interdum sit amet vel nisi. Etiam in pellentesque urna.  Quisque suscipit justo sed sapien mollis a feugiat lorem convallis. Maecenas et velit sit amet velit tristique vehicula nec eget nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget justo et nibh adipiscing convallis ut eu dolor. Nulla facilisi. Sed rutrum, lorem et tempor adipiscing, odio mauris congue sem, ut mollis lacus erat non ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque placerat ullamcorper magna non sagittis. Aliquam lacinia nisi a diam rhoncus sagittis. Ut eget orci nec massa bibendum rhoncus. Sed sed est lorem. Phasellus lobortis dui ac enim egestas bibendum. Duis facilisis mattis tellus, at lacinia nibh condimentum eget. In sit amet dapibus augue. Curabitur sit amet velit id metus tempor pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>', '2011-04-04 15:40:03', '', '', 0, ''),
(11, 'Test Five', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate.</p>', '2011-04-04 15:40:51', '', '', 0, ''),
(12, 'Test Six', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate. Praesent ut odio id nulla mollis sollicitudin a ut sem.</p><p class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ligula justo, ac ultricies purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla vel velit erat. Nam adipiscing tellus sit amet massa congue eget mattis justo bibendum. Mauris mattis hendrerit vulputate.</p>', '2011-04-04 15:40:51', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(0, 'Misc'),
(1, 'Coding'),
(2, 'test category');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`post_id`, `category_id`) VALUES
(0, 0),
(1, 0),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE IF NOT EXISTS `post_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(0, 0),
(1, 0),
(0, 1),
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 4),
(12, 3),
(12, 4),
(11, 3),
(10, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(0, 'Test Post'),
(1, 'Example Tag'),
(2, 'programming'),
(3, 'test tag'),
(4, 'second test tag');
