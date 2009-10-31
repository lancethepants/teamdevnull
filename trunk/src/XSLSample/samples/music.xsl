<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="CATALOG"> 
    <xsl:variable name="columns" select="3" />
    <TABLE border="1">
      <xsl:for-each select="CD[position() mod $columns = 1]"> 
         <TR>
           <xsl:for-each select=".|following-sibling::CD[position()]">
             <TD>
               <xsl:value-of select="." />
             </TD>
           </xsl:for-each> 
         </TR> 
      </xsl:for-each> 
    </TABLE> 
  </xsl:template> 
</xsl:stylesheet>