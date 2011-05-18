# About embr

Embr is a blog engine / tumblelog built using the CodeIgniter framework designed to be lightweight and fast. Currently embr supports text and image posts, provides a simple CMS, Disquss commenting, infinite-scrolling, keyboard navigation, Facebook opengraph tags and finally is in the final stages of allowing custom themes and "reblogging" of posts. Installation is designed to be as simple as possible; a standard LAMP setup should do just fine. 

## Example

A working text blog can be viewed [here](http://blog.laurencedawson.com/).

## Requires

* [Codeigniter 2.0.2](http://codeigniter.com/download_files/reactor/CodeIgniter_2.0.2.zip)

* [CI Template Library](http://williamsconcepts.com/ci/codeigniter/libraries/template/)

## Installation

Clone the repository:

	git clone git://github.com/laurencedawson/embr.git

Run the install script:

	cd embr && sh install.sh

Blog settings can be changed by editing the file:

	application/config/blog.php