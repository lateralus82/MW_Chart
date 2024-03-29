{default attribute_base=ContentObjectAttribute}

{def $typeArray = hash('column','Column','bar', 'Bar', 'line', 'Line', 'pie', 'Pie')}

{* Current file. *}
<div class="block">
    Type: 
    <select name="ChartType">
        {foreach $typeArray as $index=>$value}
        <option  {if $attribute.content.type|eq($index)}selected{/if} value="{$index}">{$value}</option>
        {/foreach}
    </select>


    <label>{'Current file'|i18n( 'design/standard/content/datatype' )}:</label>
    {section show=$attribute.content}
    <table class="list" cellspacing="0">
    <tr>
    <th>{'Filename'|i18n( 'design/standard/content/datatype' )}</th>
    <th>{'MIME type'|i18n( 'design/standard/content/datatype' )}</th>
    <th>{'Size'|i18n( 'design/standard/content/datatype' )}</th>
    </tr>
    <tr>
    <td>{$attribute.content.file.original_filename|wash( xhtml )}</td>
    <td>{$attribute.content.file.mime_type|wash( xhtml )}</td>
    <td>{$attribute.content.file.filesize|si( byte )}</td>
    </tr>
    </table>
    {section-else}
    <p>{'There is no file.'|i18n( 'design/standard/content/datatype' )}</p>
    {/section}

    {section show=$attribute.content}
    <input class="button" type="submit" name="CustomActionButton[{$attribute.id}_delete_binary]" value="{'Remove'|i18n( 'design/standard/content/datatype' )}" title="{'Remove the file from this draft.'|i18n( 'design/standard/content/datatype' )}" />
    {section-else}
    <input class="button-disabled" type="submit" name="CustomActionButton[{$attribute.id}_delete_binary]" value="{'Remove'|i18n( 'design/standard/content/datatype' )}" disabled="disabled" />
    {/section}
    </div>

    {* New file. *}
    <div class="block">
    <label>{'New file for upload'|i18n( 'design/standard/content/datatype' )}:</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="{$attribute.contentclass_attribute.data_int1}000000"/>
    <input class="box" name="{$attribute_base}_data_enhancedbinaryfilename_{$attribute.id}" type="file" />
</div>

{/default}
