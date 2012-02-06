# About embr

Embr is a blog engine / tumblelog built using the CodeIgniter framework designed to be lightweight and fast. Currently embr supports text and image posts, provides a simple CMS, Disquss commenting, infinite-scrolling, keyboard navigation, Facebook opengraph tags and finally is in the final stages of allowing custom themes and "reblogging" of posts. Installation is designed to be as simple as possible; a standard LAMP setup should do just fine. 

## Example

A working text blog can be viewed [here](http://embr.co/demo/).

## Requires

* [Codeigniter 2.0.2](http://codeigniter.com/download_files/reactor/CodeIgniter_2.1.0.zip)

* [CI Template Library](http://williamsconcepts.com/ci/codeigniter/libraries/template/)

## Installation

Clone the repository:

	git clone git://github.com/laurencedawson/embr.git

Run the install script:

	cd embr && sh install.sh

Blog settings can be changed by editing the file:

	application/config/blog.php

## Roadmap

- Rewrite template system from scratch
- Work on a new basic theme
- Separate the front-end and backend to allow for easier theme creation
- Support "pages" of non-blog content such as an About me page
- Post "reblogging" across self hosted embr blogs


## Contact

Laurence Dawson: [email](mailto:contact@laurencedawson.com), [twitter](http://twitter.com/#!/loljdawson)
