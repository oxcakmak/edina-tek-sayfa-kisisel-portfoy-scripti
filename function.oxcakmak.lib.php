<?php
	class oxcakmak {
		public function pstext($string){
			echo $string;
		}
		public function metaTitle($string, $stuck){
			echo "<!-- Title -->\n".'<title>'.$string.' - '.$stuck.'</title>';
		}
		public function metaDescription($string){
			echo "<!-- Description -->\n".'<meta name="description" content="'.$string.'">';
		}
		public function metaKeyword($string){
			echo "<!-- Keywords -->\n".'<meta name="keywords" content="'.$string.'">';
		}
		public function metaAuthor($string){
			echo "<!-- Author -->\n".'<meta name="author" content="'.$string.'">';
		}
		public function metaLanguage($language){
			echo "<!-- Language -->\n".'<meta http-equiv="content-language" content="'.$language.'">'."\n";
		}
		public function metaRobots($index){
			if($index==1){
				echo "<!-- Robots -->\n".'<meta name="robots" content="index,follow" />';
			}else{
				echo "<!-- Robots -->\n".'<meta name="robots" content="noindex,nofollow" />';
			}
		}
		public function metaOpenGraph($ogTitle, $ogImage, $ogDescription, $ogUrl){
			echo "<!-- Open Graph Tags -->\n".'<meta property="og:title" content="'.$ogTitle.'" />'."\n".'<meta property="og:image" content="'.$ogImage.'" />'."\n".'<meta property="og:description" content="'.$ogDescription.'" />'."\n".'<meta property="og:url" content="'.$ogUrl.'" />';
		}
		public function metaGoogleSiteVerification($string){
			echo "<!-- Google Site Verification -->\n".'<meta name="google-site-verification" content="'.$string.'">'."\n";
		}
		public function metaGoogleAnalytics($string){
			echo "<!-- Google Analytics -->\n".'<script async src="https://www.googletagmanager.com/gtag/js?id='.$string.'"></script>'."\n".'<script>'."\n".'  window.dataLayer = window.dataLayer || [];'."\n".'  function gtag(){dataLayer.push(arguments);}'."\n".'  gtag("js", new Date());'."\n\n".'  gtag("config", "'.$string.'");'."\n".'</script>';
		}
		public function metaGoogleAdsense($string){
			echo "<!-- Google Adsense -->\n".'<script data-ad-client="ca-pub-'.$string.'" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';
		}
		public function redirect($href){
			header("location: ".$href);
		}
		public function cleanString($string){
			$data = stripslashes(trim($string));
			$data = strip_tags($data);
			$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
			return $data;
		}
		public function onlyHtml($string){
			return htmlentities(trim($string));
		}
		public function hashPassword($string){
			return md5(sha1($string));
		}
		public function specificHashing($string){
			return md5(sha1($this->cleanString($string)));
		}
		public function specificMD5($str, $deep){
			return md5($str."-".bin2hex(openssl_random_pseudo_bytes($deep)));
		}
		public function specificCrc32($string){
			return hash("crc32", $string);
		}
		public function random32DigitCode(){
			return bin2hex(openssl_random_pseudo_bytes(16));
		}
		public function b64e($string){
			return base64_encode($string);
		}
		public function b64d($string){
			return base64_decode($string);
		}
		public function ntmCalculator($number){
			return number_format($number / ST_CREDIT_PRICE, 2, ".", "");
		}
		public function ntodecPoint($number){
			if($number <= 10){ 
				return $number; 
			}else if($number <= 100){
				return $number;
			}else if($number <= 1000){
				return $number;
			}else if($number <= 10000){
				return substr($number, 0, 1).' B';
			}else if($number <= 100000){
				return substr($number, 0, 2).' B';
			}else if($number <= 1000000){
				return substr($number, 0, 3).' B';
			}else if($number <= 10000000){
				return substr($number, 0, 1).' M';
			}else if($number <= 100000000){
				return substr($number, 0, 2).' M';
			}else if($number <= 1000000000){
				return substr($number, 0, 3).' M';
			}
		}
		public function scImgToHtml($shortCode){
			$xp = explode("=",$shortCode);
			return str_replace(array("[", "]"), "", $xp[1]);
		}
		public function verifyMail($email){
			$supportedMails = array('gmail.com','yahoo.com','hotmail.com','outlook.com','msn.com','yandex.com');
			foreach ($supportedMails as $domain) { 
				$pos = @strpos($email, $domain, strlen($email) - strlen($domain));
				if ($pos === false){ continue; } 
				if ($pos == 0 || $email[(int) $pos - 1] == "@" || $email[(int) $pos - 1] == "."){ return true;  } 
			}
			return false;
		}
		public function getTime(){
			return date("d.m.Y-H:i");
		}
		public function onlyDate(){
			return date("d.m.Y");
		}
		function getIPAddress(){
			if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
					  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			}
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			if(filter_var($client, FILTER_VALIDATE_IP)){ $ip = $client; }
			elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward;
			}else{ $ip = $remote; }
			return $ip;
		}
		public function slugify($hyperLinkAddress){
			$preg = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',', '+', '#', '.', '_');
			$match = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','','','', '', '', '', '');
			$perma = strtolower(str_replace($preg, $match, $hyperLinkAddress));
			$perma = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $perma);
			$perma = trim(preg_replace('/\s+/', ' ', $perma));
			$perma = str_replace(' ', '-', $perma);
			return $perma;
		}
		function checkSessionNotLogged(){
			if(empty($_SESSION['user_session'])){ $this->redirect("panel/login"); }
		}
		function checkSessionIsLogged(){
			if(isset($_SESSION['user_session'])){ $this->redirect("panel"); }
		}
		function checkRoleIsNotAdmin($roleNumber){
			if($roleNumber!=11){ $this->redirect("panel"); }
		}
	}
?>