<?php

class bite
{
	public $bitten;
	
	function __construct($rand)
	{		
		$this->bitten = $rand;
	}
	
	public function trueorfalse()
	{
		if ($this->bitten > 50)
		{
			echo "Charlie bit your  finger!";
		}
		else
		{
			echo "Charlie did not bite your finger!";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>

<?php
$rand = rand(0, 100);

$myBite = new bite($rand);
$rtnValue = $myBite->trueorfalse();
?>
</body>
</html>