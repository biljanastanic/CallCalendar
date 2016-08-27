<table>
	<tr>
		<td style="padding-bottom:5px;">

			<input type="button" id="btnCreateProject" name="btnCreateProject" onclick="
				{
					var user_choice = window.confirm('Are you sure you want to approve this application and create a project form it? Please save all your changes before continuing.');
					if(user_choice==true) {
						window.location.search += '&action=createProject';	
						alert('Project Created');
					} else {
						return false;
					}
				}
			" value="Create project" />

		</td>
	</tr>
</table>