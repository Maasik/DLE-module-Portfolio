<table width="100%">
    <tr>
        <td width="5"> </td>
        <td background="{THEME}/images/mtdbgred.png" class="ntitle">

        	{title}

        </td>
        <td width="5"> </td>
    </tr>
    <tr>
        <td>  </td>
        <td class="news" style="padding-bottom:10px;">


<form method="POST">

	<table cellpadding="4" cellspacing="0">
	<tr>
		<td style="padding:4px">���� �������:</td>
		<td style="padding:4px">
		<select name="port[services]" id="services">
			<option value="0"></option>
			{services}
		</select>
		</td>
	</tr>
	<tr>
		<td style="padding:4px">ֳ�� �� 1 ��:</td>
		<td style="padding:4px">
			<input type="text" name="port[price]" value="{price}" title="������ ���� � ���., ����� �����, ��� ���" />
		</td>
	</tr>
	<tr>
		<td style="padding:4px" align=left> ̳������� ���� ����������: </td>
		<td style="padding:4px">
			<input type="text" name="port[minimum_order]" value="{minimum_order}" title="������ ���� �� ��� ��� �� ����� ���� ������� ����� ���� � ���., ����� �����, ��� ���"  />
		</td>
	</tr>
	<tr>
		<td style="padding:4px">�����:</td>
		<td style="padding:4px">
			<select name="port[country]" id="country" onChange="getRegions(this.value, 'region');">
				<option value="0"></option>
				{country}
			</select>
		</td>
	</tr>
	<tr>
		<td style="padding:4px">�������:</td>
		<td style="padding:4px">
			<select name="port[region]" id="region" onChange="getTowns_marked(this.value, 'town');">
				{region}
			</select>
		</td>
	</tr>
	<tr>
		<td style="padding:4px">̳���:</td>
		<td style="padding:4px">
			<select name="port[town]" id="town" title="���� ������ ���� ���� � ������, ��������� �� ������������, ��� ���� �����">
				{town}
			</select>
		</td>
	</tr>
	<tr>
		<td style="padding:4px">������:</td>
		<td style="padding:4px"><input type="text" name="port[address]" value="{address}" title="���� �����, �� ������������� ������ ��������� ���� ����� �������� �� �� ����������� ������ ���� ������, ���� �� ����� �� ��� ������ �� �����" /></td>
	</tr>
	<tr>
		<td style="padding:4px" align=left>�������� ��� ���� �� ��� �������:</td>
		<td style="padding:4px">
			<textarea title="ʳ���� ��� ��� ���� ������� ��� ��� ����" name="port[comment]" cols="60" rows="8">{comment}</textarea>
		</td>
	</tr>
	<tr>
		<td style="padding:4px">ICQ:</td>
		<td style="padding:4px"><input type="text" name="port[icq]" value="{icq}" /></td>
	</tr>
	<tr>
		<td style="padding:4px">Skype:</td>
		<td style="padding:4px"><input type="text" name="port[skype]" value="{skype}" /></td>
	</tr>
	<tr>
		<td style="padding:4px">E-mail:</td>
		<td style="padding:4px"><input type="text" name="port[email]" value="{email}" /></td>
	</tr>
	<tr>
		<td style="padding:4px">�������:</td>
		<td style="padding:4px"><input type="text" name="port[phone]" value="{phone}" /></td>
	</tr>
	<tr>
		<td style="padding:4px" align=left>��������� ��� ��� ���'���:</td>
		<td style="padding:4px"><input type="text" name="port[contact_time]" value="{contact_time}" title="� ���� ��� �������� ������������ �� ��� ��� ����������" /></td>
	</tr>
	<tr>
		<td style="padding:4px">���� ����:</td>
		<td style="padding:4px"><input type="file" name="foto" value="" title="������� ���� ���������� ������ ������� �� ����� 200" /></td>
	</tr>
	</table>

	<div style="padding:4px">

		<div style="padding-bottom:10px">���� ����� ����: <br /><small>������ �������� <i>Browse</i> (����� ���� ������� JavaScript � Flash) � ������ ������� ���� ����� ���� (��������� ������ CTRL, ��� �������� ������). ���� �� ���� ������ ������, ������ <i>��������� ������������</i>. ���� ���������� ��ﳿ ����� ���� ��������� �� �������, ������ ��������� ������ <i>������ ��������</i></div>

		<div id="fotos">{images}</div>

	</div>
<div style="float:right">
	<input type="submit" value=" {button} " />
</div>
</form>

<div>
	<script type="text/javascript" src="/engine/modules/portfolio/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="/engine/inc/portfolio/js/town.js"></script>
	<script type="text/javascript" src="/engine/modules/portfolio/js/jquery.MultiFile.js"></script>
	<script type="text/javascript" src="/engine/modules/portfolio/js/jquery.form.js"></script>
	<script type="text/javascript" src="/engine/modules/portfolio/js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="/engine/modules/portfolio/js/app.MultiFile.js"></script>

	<img id="loading" src="/engine/modules/portfolio/img/loading.gif" style="display:none;"/>
	<form id="uploadForm" action="/engine/modules/portfolio/doajaxfileupload.php" method="post" enctype="multipart/form-data">
	    <input type="hidden" name="user_id" value="{user_id}" />
	    <input name="MAX_FILE_SIZE" value="1000000" type="hidden"/>
	    File: <input name="fileToUpload[]" id="fileToUpload" class="MultiFile" type="file"/>
	    <input value="Submit" type="submit"/>
	</form>
	<div id="uploadOutput"></div>
</div>

<br /><br />
<div align=left>
 P.s. ���� �������� �������� �� ���� ���� �������� �������������. <br>
� ����� ������� ��� ��� ��� �� ������� ������ ���� ���������� �� �������� �����, ������ ���� �� ��������� ����������. �� ���� �������������� � ����� ������. 
</div>
</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="5"></td>
		<td" class="slink" align="right">&nbsp;</td>
        <td width="5"></td>
    </tr>
</table>
