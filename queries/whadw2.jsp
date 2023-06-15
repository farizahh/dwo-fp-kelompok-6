<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/dw_adventureworks?user=root&password=" catalogUri="/WEB-INF/queries/dwadw2.xml">

select {[Measures].[stocked_quantity],[Measures].[keterlambatan],[Measures].[scrapped_quantity]} ON COLUMNS,
  {([Product],[Time].[All Times],[Scrap Reason])} ON ROWS
from [Stok]


</jp:mondrianQuery>





<c:set var="title01" scope="session">Query WHAdventureWorks using Mondrian OLAP</c:set>
