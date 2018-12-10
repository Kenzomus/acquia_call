Module: Acquia_api
the purpose is to make request in sitfactory, to back up and delete the Sites that belong to the group_name:"Expired".
This involves several requests .
1. there is a form to get the username, password, api_key to pass as parameter to the endpoint.

2. to get the group that contains in the name "expired", get the group id to request all the sites that belong to the group with the corresponding id. 
3.loop thru to get the $site_id to pass it as a parameter to the backup endpoint.
4.Once backup, get the $back_up_id to pass a parameter to the back_up_url endpoind to get the back up url.
5.Call the Delete , pass it the $site_id.
6.Create a reports under /Reports/sites deletes that listed all the sites, belonging to the group that contains "Expired" in their name, backed up, deleted.
In this report you have the user who run it, the sites names, the backup url, the date. 

