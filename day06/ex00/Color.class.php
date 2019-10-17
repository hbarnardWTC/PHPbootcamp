<?php
	class Color
	{
		public $red;
		public $green;
		public $blue;
		static $verbose = false;

		static function doc()
		{
			return(file_get_contents("Color.doc.txt"));
		}

		public function __construct(array $values)
		{
			if (isset($values['rgb']))
			{
				$color = intval($values['rgb'], 10);
				$this->red = floor($color / 65536);
				$this->green = floor($color % 65536 / 256);
				$this->blue = floor($color % 65536 % 256);
			}
			else if (isset($values['red']) && isset($values['green']) && isset($values['blue']))
			{
				$this->red = floor(intval($values['red'],10));
				$this->green = floor(intval($values['green'],10));
				$this->blue = floor(intval($values['blue'],10));
			}
			if(self::$verbose)
			{
				print($this . " constructed.\n");
			}
		}

		public function __destruct()
		{
			if (self::$verbose)
				print($this . " destructed.\n");
		}

		public function __toString()
		{
			$ret = sprintf("Color( red: %3d, green: %3d, blue: %3d )",
			$this->red, $this->green, $this->blue);
			return $ret;
		}

		function add(Color $c2)
		{
			$nred = $this->red + $c2->red;
			$ngreen = $this->green + $c2->green;
			$nblue = $this->blue + $c2->blue;
			$new_colour = NEW color( array('red' => $nred, 'blue' => $nblue, 'green' => $ngreen));
			return $new_colour;
		}

		function sub(Color $c2)
		{
			$nred = $this->red - $c2->red;
			$ngreen = $this->green - $c2->green;
			$nblue = $this->blue - $c2->blue;
			$new_colour = NEW color(array ('red' => $nred,'blue' => $nblue, 'green' => $ngreen));
			return $new_colour;
		}

		function mult($f)
		{
			$nred = $this->red * $c2->red;
			$ngreen = $this->green * $c2->green;
			$nblue = $this->blue * $c2->blue;
			$new_colour = NEW color(array('red' => $nred,'blue' => $nblue, 'green' => $ngreen));
			return $new_colour;
		}
	}

print( Color::doc() );
Color::$verbose = True;

$red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
$green   = new Color( array( 'rgb' => 255 << 8 ) );
$blue    = new Color( array( 'red' => 0   , 'green' => 0   , 'blue' => 0xff ) );

$yellow  = $red->add( $green );
$cyan    = $green->add( $blue );
$magenta = $blue->add( $red );

$white   = $red->add( $green )->add( $blue );

print( $red     . PHP_EOL );
print( $green   . PHP_EOL );
print( $blue    . PHP_EOL );
print( $yellow  . PHP_EOL );
print( $cyan    . PHP_EOL );
print( $magenta . PHP_EOL );
print( $white   . PHP_EOL );

Color::$verbose = False;

$black = $white->sub( $red )->sub( $green )->sub( $blue );
print( 'Black: ' . $black . PHP_EOL );

Color::$verbose = True;

$darkgrey = new Color( array( 'rgb' => (10 << 16) + (10 << 8) + 10 ) );
print( 'darkgrey: ' . $darkgrey . PHP_EOL );
$lightgrey = $darkgrey->mult( 22.5 );
print( 'lightgrey: ' . $lightgrey . PHP_EOL );

$random = new Color( array( 'red' => 12.3, 'green' => 31.2, 'blue' => 23.1 ) );
print( 'random: ' . $random . PHP_EOL );

?>