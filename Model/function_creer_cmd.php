<?php
    function addToCart($qte, $produitId, $db) {
        if (!is_numeric($qte) || $qte < 0) return;
        //            
        require_once("Model/function_produit.php");
        $produit = findProduit($produitId, $db);
        addProduitToCart($qte, $produit);
    }

    function updateQuantiteProduit($qte, $produitId, $db) {
        if (!is_numeric($qte) || $qte < 0) return;
        //
        $cart =& findcart();
        foreach ($cart['lineitems'] as $key => $value) {
            if ($value['produit']['idproduit'] == $produitId) {
                if ($qte > $value['produit']['stock_dispo']) {
                    $cart['lineitems'][$key]['quantite'] = $value['produit']['stock_dispo'];
                    return;
                } else {
                    $cart['lineitems'][$key]['quantite'] = $qte;
                    return;
                }
            }
        }
    }

    function addProduitToCart($qte, $produit) {
        $cart =& findcart();
        foreach ($cart['lineitems'] as $key => $value) {
            $tot_qte = $cart['lineitems'][$key]['quantite'] + $qte;
            if ($value['produit']['idproduit'] == $produit['idproduit']) {
                if ($tot_qte > $value['produit']['stock_dispo']) {
                    $cart['lineitems'][$key]['quantite'] = $value['produit']['stock_dispo'];
                    return;
                } else {
                    $cart['lineitems'][$key]['quantite'] += $qte;
                    return;
                }
            }
        }
        addNewProduitToCart($qte, $produit);
    }

    function addNewProduitToCart($qte, $produit) {
        $cart =& findcart();
        $add = array('quantite' => $qte, 'produit' => $produit);
        $cart['lineitems'][] = $add;
    }

    function &findcart() {
        if (!isset($_SESSION['cart'])) {
            $lineitems = array();
            $_SESSION['cart'] = array("lineitems" => $lineitems);
        }
        return $_SESSION['cart'];
    }

    function emptyCart() {
        unset($_SESSION['cart']);
    }

    function cartTotalPrice() {
		$total = 0;
		$cart = findcart();
		foreach ($cart['lineitems'] as $key => $item) {
			$total += $item['produit']['prix'] * $item['quantite'];
		}
		return $total;
	}

?>