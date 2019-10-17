<?php
class NightsWatch
{
	private $recruits;
	public function recruit($rookie)
	{
		$this->recruits[] = $rookie;
	}

	public function fight()
	{
		foreach($this->recruits as $key => $values)
		{
			if($values instanceof IFighter)
			{
				$values->fight();
			}
		}
	}
}

?>