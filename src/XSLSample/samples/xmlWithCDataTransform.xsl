<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:msxsl="urn:schemas-microsoft-com:xslt" exclude-result-prefixes="msxsl"
>
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			<head>
				<meta name="author" content="Ryan Jones" />
				<meta name="keywords" content="Ryan, WSU, Student, Software Engineering"/>
				<meta name="description" content="CDATA Tranformation page"/>
				<title>
					CDATA Transform
				</title>
				<link type="text/css" rel="Stylesheet" href="../MainStyles.css" />
				<link type="text/css" rel="Stylesheet" href="StyleSheetW5.css" />
				<script type="text/javascript" language="javascript" src="../jscript/ui.js"></script>
				<script type="text/javascript" language="javascript" src="../jscript/navigation.js"></script>
			</head>
			<body onload="onLoad();">
				<center>
					<h2>Week 5 Exercise 2 - CDATA</h2>
				</center>
                <xsl:element name="table">
                    <xsl:attribute name="style">
                        <xsl:value-of select="Root/TableNodes/table/@style"/>
                    </xsl:attribute>
                    <xsl:element name="tr">
                        <xsl:element name="td">
                            <xsl:value-of select="Root/TableNodes/table/tr/td"/>
                        </xsl:element>
                    </xsl:element>
                </xsl:element>
                <br/>
                <xsl:text>The following code will generate the table above</xsl:text>
                <br/>
                <pre>
                    <xsl:value-of select="/Root/TableCodeGeneration"/>
                </pre>
				<p/>
                <xsl:element name="form">
                    <xsl:attribute name="name">
                        <xsl:value-of select="/Root/FormNodes/form/@name"/>
                    </xsl:attribute>
                    <xsl:attribute name="style">border: dotted 2px green;</xsl:attribute>
                    <xsl:for-each select="/Root/FormNodes/form/input">
                        <xsl:element name="input">
                            <xsl:attribute name="type">
                                <xsl:value-of select="@type"/>
                            </xsl:attribute>
                            <xsl:attribute name="name">
                                <xsl:value-of select="@name"/>
                            </xsl:attribute>
                            <xsl:attribute name="value">
                                <xsl:value-of select="@value"/>
                            </xsl:attribute>
                        </xsl:element>
                    </xsl:for-each>
                </xsl:element>
                <br/>
                <xsl:text>The following code will generate the form above</xsl:text>
                <br/>
                <pre>
                    <xsl:value-of select="/Root/FormCodeGeneration"/>
                </pre>
                <p/>
				<center>
					<div class="mainBody" style="text-align: center">
						<a href="../index.html" accesskey="H" name="accessLinks">Home</a> |
						<a href="../homework.html" accesskey="W" name="accessLinks">Homework</a>
					</div>
				</center>
			</body>
		</html>
    </xsl:template>
	
</xsl:stylesheet>
