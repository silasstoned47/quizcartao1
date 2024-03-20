<?php

	require_once("includes/ActiveCampaign.class.php");

	$ac = new ActiveCampaign("https://contato64783.api-us1.com", "befab84f20fd9265b72e7a79356aec4f794f89d05c346a827360fdcb021b82458a70147a");

	/*
	 * TEST API CREDENTIALS.
	 */

	if (!(int)$ac->credentials_test()) {
		echo "<p>Access denied: Invalid credentials (URL and/or API key).</p>";
		exit();
	}
	
        echo "<p>Credentials valid! Proceeding...</p>";
	
$tag_id = 1;
  $list_id = 1;
	/*
	 * ADD OR EDIT CONTACT (TO THE NEW LIST CREATED ABOVE).
	 */

	$contact = array(
		"email"              => "test5@example.com",
		"first_name"         => "Test4",
		"last_name"          => "Test",
		"p[{$list_id}]"      => $list_id,
		"status[{$list_id}]" => 1, // "Active" status
	);

	$contact_sync = $ac->api("contact/sync", $contact);

	if (!(int)$contact_sync->success) {
		// request failed
		echo "<p>Syncing contact failed. Error returned: " . $contact_sync->error . "</p>";
		exit();
	}
        
        // successful request
        $contact_id = (int)$contact_sync->subscriber_id;
        echo "<p>Contact synced successfully (ID {$contact_id})!</p>";
        
     
        
    
        

	?>

