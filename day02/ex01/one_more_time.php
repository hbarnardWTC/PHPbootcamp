#!/usr/bin/php
<?PHP
function transformMonth($x)
{
    $array = array("Janvier" => 1,
                   "Fevrier" => 2,
                   "Mars" => 3,
                   "Avril" => 4,
                   "Mai" => 5,
                   "Juin" => 6,
                   "Juillet" => 7,
                   "Aout" => 8,
                   "Septembre" => 9,
                   "Octobre" => 10,
                   "Novembre" => 11,
                   "Decembre" => 12);
    return $array[$x];
}
function wrong_format()
{
	echo "Wrong Format\n";
	exit ();
}
if ($argc > 1)
{
    if (preg_match("/(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([0-9]{2}) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) ([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/", $argv[1], $matches))
    {
        if ($matches[5] > 23 || $matches[6] > 59 || $matches[7] > 59)
        {
			wrong_format();
		}
		if (transformMonth($matches[3]) == 1 || transformMonth($matches[3]) == 3 || transformMonth($matches[3]) == 5 || transformMonth($matches[3]) == 7 || transformMonth($matches[3]) == 8
		 || transformMonth($matches[3]) == 10 || transformMonth($matches[3]) == 12){
			if ($matches[2] > 31)
			{
				wrong_format();
			}
		}
		else if (transformMonth($matches[3]) == 4 || transformMonth($matches[3]) == 6 || transformMonth($matches[3]) == 9 || transformMonth($matches[3]) == 11){
			if ($matches[2] > 30){
				wrong_format();
			}
		}
		else if (transformMonth($matches[3]) == 2 && ($matches[4] % 4 != 0 || ($matches[4] % 100 == 0 && $matches[4] % 400 != 0))){
			if ($matches[2] > 28){
				wrong_format();
			}
		}
		else if (transformMonth($matches[3]) == 2){
			if ($matches[2] > 29){
				wrong_format();
			}	
		}
		else{
			wrong_format();
		}
        date_default_timezone_set("Europe/Paris");
        print(mktime($matches[5], $matches[6], $matches[7],
                transformMonth($matches[3]), $matches[2], $matches[4]));
    }
    else
        print("Wrong Format");
    print "\n";
}?>