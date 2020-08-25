<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

define ("API_ACCESS_KEY", "AAAAU_upUJQ:APA91bGWgQOAeYXjCUE6-8N6FFlBnhEjrqQPEVu6OzEdMTcyARbkkiuD7RnI8pC9I5Y5SqYVBYtrijcHsq1OdBHA-hgD16upKFdUQqdYkC9OID8LmD4hOxchmQO1Kzq6MgRQSphQZ8MV");

class FCM extends DbEcommerceConn {
    public function notifyAllUsers($notification) {
        echo "notification processing...";

        $regitration_ids = array();
        foreach ($this->fetchAllTokens() as $id) {
            $regitration_ids[] = $id["token"];
        }
        
        $fields = array(
            // "to" => $token,  // used for single token
            "registration_ids" => $regitration_ids,
            "notification" => $notification
        );
        
        $this->executeCurl($fields);
    }

    /**
     * @param 
     * $to is fcm_token of the user to which the notification
     * is to be sent
     */
    public function notifySingleUser($to, $notification, $data = null) {
        $fields = array(
            "to" => $to,
            "notification" => $notification,
            "data" => $data
        );
        
        $this->executeCurl($fields);
    }

    public function insert($token, $uid = null) {
        $sql = null;
        if ($uid == null) {
            $sql = "INSERT INTO fcm(token) VALUES ('$token');";
        } else {
            $sql = "INSERT INTO fcm(token, uid) VALUES ('$token', '$uid')
                    ON DUPLICATE KEY UPDATE 
                        token = '$token',
                        uid = '$uid';";
        }

        if ($this->connection()->query($sql)) 
            echo "response: success";
        else
            echo "response: failure";
    }

    public function fetchAllTokens() : array {
        $sql = "SELECT token FROM fcm WHERE token IS NOT NULL";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function updateToken($oldToken, $newToken) {
        $sql = "UPDATE fcm SET token = $newToken WHERE token = $oldToken";
        if ($this->connection()->query($sql)) 
            echo "response: success";
        else
            echo "responose: failure";
    }

    public function deleteByToken($token) {
        $sql = "DELETE FROM fcm WHERE token = '$token';";
        $this->connection()->query($sql);
    }

    private function executeCurl($fields) {
        $headers = array(
            "Authorization: key=" . API_ACCESS_KEY,
            "Content-Type: application/Json"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        echo $result;

        curl_close($ch);
    }
}