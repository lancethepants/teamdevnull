<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			<head>
				<meta name="author" content="Ryan Jones" />
				<meta name="keywords" content="Ryan, WSU, Student, Software Engineering"/>
				<meta name="description" content="XML markup Tranformation page"/>
				<title>
					<!-- Here we set the title with a static value and a value from the XML document -->
					Nutrition Facts - <xsl:value-of select="/NutritionFacts/ProductName"/>
				</title>
				<link type="text/css" rel="Stylesheet" href="../MainStyles.css" />
				<link type="text/css" rel="Stylesheet" href="StyleSheetW5.css" />
				<script type="text/javascript" language="javascript" src="../jscript/ui.js"></script>
				<script type="text/javascript" language="javascript" src="../jscript/navigation.js"></script>
			</head>
			<body onload="onLoad();">
				<center>
					<h2>Week 5 Exercise 1 - XML Markup (Nutrition Facts)</h2>
				</center>
				<center>
				<div class="ProductName" align="center">
					<!-- Pull the product name from the XML doc using xPath expression -->
					<xsl:value-of select="/NutritionFacts/ProductName"/>
				</div>
				<div class="OuterRim" align="center">
					<table cellspacing="0" cellpadding="0" class="NutritionFactTable">
						<tr>
							<th colspan="3" class="NutritionFactsHeader">Nutrition Facts</th>
						</tr>
						<tbody class="NutritionFactsInformation">
							<tr>
								<td colspan="3">
									Serving Size <xsl:value-of select="/NutritionFacts/ServingInformation/ServingSize"/>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									Servings Per Container <xsl:value-of select="/NutritionFacts/ServingInformation/ServingsPerContainer"/>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="font-size: 4px; border-bottom: solid 6px black;">
									<img src="../Images/1px_spacer.gif" style="width: 1px; height: 5px;"/>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="smallTextWithBB">
									Amount Per Serving
								</td>
							</tr>
							<tr>
								<td style="width: 144px;">
									<img src="../Images/1px_spacer.gif"/>
								</td>
								<td class="valueHeader">8 fl oz</td>
								<td class="valueHeader">per bottle</td>
							</tr>
							<tr>
								<td class="labelCell" style="font-size: 12px; border-bottom: solid 3px black;">
									<xsl:value-of select="/NutritionFacts/Facts/Calories/@name"/>
								</td>
								<td class="regularCell" style="border-bottom: solid 3px black;">
									<xsl:value-of select="/NutritionFacts/Facts/Calories/EightFlOz"/>
								</td>
								<td class="regularCell" style="border-bottom: solid 3px black;">
									<xsl:value-of select="/NutritionFacts/Facts/Calories/PerBottle"/>
								</td>
							</tr>
							<tr>
								<td class="BB1px">
									<img src="../Images/1px_spacer.gif"/>
								</td>
								<td colspan="2" class="smallTextWithBB">
									%Daily&#160;Value<sup>*</sup>
								</td>
							</tr>
							<!-- Loop through the item nodes of the XML doc -->
							<xsl:for-each select="/NutritionFacts/Facts/Item">
								<tr>
									<td class="labelCell">
										<xsl:attribute name="style">
											<xsl:choose>
												<xsl:when test="@name = 'Protein'">border-bottom: solid 6px black;</xsl:when>
												<xsl:otherwise></xsl:otherwise>
											</xsl:choose>
										</xsl:attribute>
										<xsl:value-of select="@name"/>
										<xsl:text> </xsl:text>
										<span class="regularCell">
											<xsl:value-of select="Amount/EightFlOz"/>
											<xsl:text> </xsl:text>
											<xsl:value-of select="Amount/PerBottle"/>
										</span>
									</td>
									<!-- Call a template with the name DailyValuesCells. This is practically a
										 function in XSL
									-->
									<xsl:call-template name="DailyValuesCells">
										<!-- we are passing a parameter to the template -->
										<xsl:with-param name="value" select="DailyValue/EightFlOz"/>
									</xsl:call-template>
									<xsl:call-template name="DailyValuesCells">
										<xsl:with-param name="value" select="DailyValue/PerBottle"/>
									</xsl:call-template>
								</tr>
								<!-- This is like a switch statement or an if...elseif statement -->
								<xsl:choose>
									<xsl:when test="@name = 'Total Carb.'">
										<tr>
											<td class="regularCell BB1px" style="text-indent: 5px;">
												<xsl:value-of select="Sugars/@name"/>
												<!-- XSL is kind of strange in the fact that you can't use full out
													 HTML constructs to add a space unless you pre-define them.
													 Meaning that you cannot use &nbsp; to create a space instead we're
													 just using an xsl text node to add the space
												-->
												<xsl:text> </xsl:text>
												<xsl:value-of select="Sugars/Amount/EightFlOz"/>
												<xsl:text> </xsl:text>
												<xsl:value-of select="Sugars/Amount/PerBottle"/>
											</td>
											<td class="BB1px">
												<img src="../Images/1px_spacer.gif"/>
											</td>
											<td class="BB1px">
												<img src="../Images/1px_spacer.gif"/>
											</td>
										</tr>
									</xsl:when>
									<xsl:otherwise></xsl:otherwise>
								</xsl:choose>
							</xsl:for-each>
							<tr>
								<td colspan="3" class="smallText8px">
									<sup>*</sup>Percent Daily Values are bassed on a 2,000 calorie diet
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				</center>
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

	<xsl:template name="DailyValuesCells">
		<xsl:param name="value" />
		<td class="labelCell">
			<xsl:attribute name="style">
				<xsl:choose>
					<xsl:when test="@name = 'Protein'">text-align: center; border-bottom: solid 6px black;</xsl:when>
					<xsl:otherwise>text-align: center;</xsl:otherwise>
				</xsl:choose>
			</xsl:attribute>
			<!-- here is a way to test for values and then only display certain things -->
			<xsl:if test="@name = 'Protein'">
				<img src="../Images/1px_spacer.gif"/>
			</xsl:if>
			<xsl:value-of select="$value"/>
		</td>
	</xsl:template>
	
</xsl:stylesheet>
