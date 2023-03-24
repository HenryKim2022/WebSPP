
/* Note:
--
-- THIS QUERY IS RESSETING ALL STATUS LUNAS
-- YOU MUST 'BAYAR ULANG' FROM TRANSACTION MENU MANUALLY after RUNNING THIS QUERY 
--
*/

USE webspp;
UPDATE pembayaran SET 
	nobayar = '',
	tglbayar = '',
	ket = '',
	id_admin = '0'
	WHERE ket="LUNAS"