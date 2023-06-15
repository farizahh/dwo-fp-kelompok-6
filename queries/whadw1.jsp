<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/dw_adventureworks?user=root&password=" catalogUri="/WEB-INF/queries/dwadw1.xml">

select {[Measures].[unit_price],[Measures].[line_total]} ON COLUMNS,
  {([Product],[Time].[All Times],[Contact],[Territory],[Ship Method])} ON ROWS
from [Penjualan]


</jp:mondrianQuery>





<c:set var="title01" scope="session">Query WHAdventureWorks using Mondrian OLAP</c:set>
