#!/usr/bin/php
<?PHP
	echo "Enter a number:";
	while ($input = trim(fgets(STDIN)))
	{
		if (is_numeric(trim($input)))
		{
			echo "The number ", $input, " is ";
			if ($input & 1)
			{
				echo "odd";
			}
			else
			{
				echo "even";
			}
		}
		else
		{
			echo "'", $input, "' is not a number";
		}
		echo "\n";
		echo "Enter a number:";
	}
?>