USE [master]
GO
/****** Object:  Database [LuxYachtDieselDB]    Script Date: 08-11-2020 16:07:28 ******/
CREATE DATABASE [LuxYachtDieselDB]
 CONTAINMENT = NONE 
GO
ALTER DATABASE [LuxYachtDieselDB] SET COMPATIBILITY_LEVEL = 130
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [LuxYachtDieselDB].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [LuxYachtDieselDB] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET ARITHABORT OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [LuxYachtDieselDB] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [LuxYachtDieselDB] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET  DISABLE_BROKER 
GO
ALTER DATABASE [LuxYachtDieselDB] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [LuxYachtDieselDB] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [LuxYachtDieselDB] SET  MULTI_USER 
GO
ALTER DATABASE [LuxYachtDieselDB] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [LuxYachtDieselDB] SET DB_CHAINING OFF 
GO
ALTER DATABASE [LuxYachtDieselDB] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [LuxYachtDieselDB] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [LuxYachtDieselDB] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [LuxYachtDieselDB] SET QUERY_STORE = OFF
GO
USE [LuxYachtDieselDB]
GO
ALTER DATABASE SCOPED CONFIGURATION SET LEGACY_CARDINALITY_ESTIMATION = OFF;
GO
ALTER DATABASE SCOPED CONFIGURATION SET MAXDOP = 0;
GO
ALTER DATABASE SCOPED CONFIGURATION SET PARAMETER_SNIFFING = ON;
GO
ALTER DATABASE SCOPED CONFIGURATION SET QUERY_OPTIMIZER_HOTFIXES = OFF;
GO
USE [LuxYachtDieselDB]
GO
/****** Object:  Table [dbo].[CountryCurrency]    Script Date: 08-11-2020 16:07:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[CountryCurrency](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[country] [nvarchar](100) NOT NULL,
	[countryCode] [nvarchar](5) NOT NULL,
	[currency] [nvarchar](100) NOT NULL,
	[currencyCode] [nvarchar](5) NOT NULL,
 CONSTRAINT [PK_CountryCurrency] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Customers]    Script Date: 08-11-2020 16:07:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Customers](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](30) NOT NULL,
	[address] [nvarchar](60) NOT NULL,
	[city] [nvarchar](15) NOT NULL,
	[postalCode] [nvarchar](10) NOT NULL,
	[country] [int] NOT NULL,
	[phone] [nvarchar](24) NOT NULL,
	[mailAdr] [nvarchar](24) NOT NULL
	CONSTRAINT [PK_Customers] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]

) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DieselPrice]    Script Date: 08-11-2020 16:07:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DieselPrice](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[date] [date] NOT NULL,
	[price] [money] NOT NULL,
 CONSTRAINT [PK_DieselPrice] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[CountryCurrency] ON 

INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (1, N'New Zealand', N'NZ', N'New Zealand Dollars', N'NZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (2, N'Cook Islands', N'CK', N'New Zealand Dollars', N'NZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (3, N'Niue', N'NU', N'New Zealand Dollars', N'NZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (4, N'Pitcairn', N'PN', N'New Zealand Dollars', N'NZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (5, N'Tokelau', N'TK', N'New Zealand Dollars', N'NZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (6, N'Australian', N'AU', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (7, N'Christmas Island', N'CX', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (8, N'Cocos (Keeling) Islands', N'CC', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (9, N'Heard and Mc Donald Islands', N'HM', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (10, N'Kiribati', N'KI', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (11, N'Nauru', N'NR', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (12, N'Norfolk Island', N'NF', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (13, N'Tuvalu', N'TV', N'Australian Dollars', N'AUD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (14, N'American Samoa', N'AS', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (15, N'Andorra', N'AD', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (16, N'Austria', N'AT', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (17, N'Belgium', N'BE', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (18, N'Finland', N'FI', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (19, N'France', N'FR', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (20, N'French Guiana', N'GF', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (21, N'French Southern Territories', N'TF', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (22, N'Germany', N'DE', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (23, N'Greece', N'GR', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (24, N'Guadeloupe', N'GP', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (25, N'Ireland', N'IE', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (26, N'Italy', N'IT', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (27, N'Luxembourg', N'LU', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (28, N'Martinique', N'MQ', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (29, N'Mayotte', N'YT', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (30, N'Monaco', N'MC', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (31, N'Netherlands', N'NL', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (32, N'Portugal', N'PT', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (33, N'Reunion', N'RE', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (34, N'Samoa', N'WS', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (35, N'San Marino', N'SM', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (36, N'Slovenia', N'SI', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (37, N'Spain', N'ES', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (38, N'Vatican City State (Holy See)', N'VA', N'Euros', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (39, N'South Georgia and the South Sandwich Islands', N'GS', N'Sterling', N'GBP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (40, N'United Kingdom', N'GB', N'Sterling', N'GBP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (41, N'Jersey', N'JE', N'Sterling', N'GBP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (42, N'British Indian Ocean Territory', N'IO', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (43, N'Guam', N'GU', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (44, N'Marshall Islands', N'MH', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (45, N'Micronesia Federated States of', N'FM', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (46, N'Northern Mariana Islands', N'MP', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (47, N'Palau', N'PW', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (48, N'Puerto Rico', N'PR', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (49, N'Turks and Caicos Islands', N'TC', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (50, N'United States', N'US', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (51, N'United States Minor Outlying Islands', N'UM', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (52, N'Virgin Islands (British)', N'VG', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (53, N'Virgin Islands (US)', N'VI', N'USD', N'USD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (54, N'Hong Kong', N'HK', N'HKD', N'HKD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (55, N'Canada', N'CA', N'Canadian Dollar', N'CAD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (56, N'Japan', N'JP', N'Japanese Yen', N'JPY')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (57, N'Afghanistan', N'AF', N'Afghani', N'AFN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (58, N'Albania', N'AL', N'Lek', N'ALL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (59, N'Algeria', N'DZ', N'Algerian Dinar', N'DZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (60, N'Anguilla', N'AI', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (61, N'Antigua and Barbuda', N'AG', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (62, N'Dominica', N'DM', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (63, N'Grenada', N'GD', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (64, N'Montserrat', N'MS', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (65, N'Saint Kitts', N'KN', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (66, N'Saint Lucia', N'LC', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (67, N'Saint Vincent Grenadines', N'VC', N'East Caribbean Dollar', N'XCD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (68, N'Argentina', N'AR', N'Peso', N'ARS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (69, N'Armenia', N'AM', N'Dram', N'AMD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (70, N'Aruba', N'AW', N'Netherlands Antilles Guilder', N'ANG')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (71, N'Netherlands Antilles', N'AN', N'Netherlands Antilles Guilder', N'ANG')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (72, N'Azerbaijan', N'AZ', N'Manat', N'AZN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (73, N'Bahamas', N'BS', N'Bahamian Dollar', N'BSD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (74, N'Bahrain', N'BH', N'Bahraini Dinar', N'BHD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (75, N'Bangladesh', N'BD', N'Taka', N'BDT')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (76, N'Barbados', N'BB', N'Barbadian Dollar', N'BBD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (77, N'Belarus', N'BY', N'Belarus Ruble', N'BYR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (78, N'Belize', N'BZ', N'Belizean Dollar', N'BZD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (79, N'Benin', N'BJ', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (80, N'Burkina Faso', N'BF', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (81, N'Guinea-Bissau', N'GW', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (82, N'Ivory Coast', N'CI', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (83, N'Mali', N'ML', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (84, N'Niger', N'NE', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (85, N'Senegal', N'SN', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (86, N'Togo', N'TG', N'CFA Franc BCEAO', N'XOF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (87, N'Bermuda', N'BM', N'Bermudian Dollar', N'BMD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (88, N'Bhutan', N'BT', N'Indian Rupee', N'INR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (89, N'India', N'IN', N'Indian Rupee', N'INR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (90, N'Bolivia', N'BO', N'Boliviano', N'BOB')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (91, N'Botswana', N'BW', N'Pula', N'BWP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (92, N'Bouvet Island', N'BV', N'Norwegian Krone', N'NOK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (93, N'Norway', N'NO', N'Norwegian Krone', N'NOK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (94, N'Svalbard and Jan Mayen Islands', N'SJ', N'Norwegian Krone', N'NOK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (95, N'Brazil', N'BR', N'Brazil', N'BRL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (96, N'Brunei Darussalam', N'BN', N'Bruneian Dollar', N'BND')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (97, N'Bulgaria', N'BG', N'Lev', N'BGN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (98, N'Burundi', N'BI', N'Burundi Franc', N'BIF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (99, N'Cambodia', N'KH', N'Riel', N'KHR')
GO
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (100, N'Cameroon', N'CM', N'CFA Franc BEAC', N'XAF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (101, N'Central African Republic', N'CF', N'CFA Franc BEAC', N'XAF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (102, N'Chad', N'TD', N'CFA Franc BEAC', N'XAF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (103, N'Congo Republic of the Democratic', N'CG', N'CFA Franc BEAC', N'XAF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (104, N'Equatorial Guinea', N'GQ', N'CFA Franc BEAC', N'XAF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (105, N'Gabon', N'GA', N'CFA Franc BEAC', N'XAF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (106, N'Cape Verde', N'CV', N'Escudo', N'CVE')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (107, N'Cayman Islands', N'KY', N'Caymanian Dollar', N'KYD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (108, N'Chile', N'CL', N'Chilean Peso', N'CLP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (109, N'China', N'CN', N'Yuan Renminbi', N'CNY')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (110, N'Colombia', N'CO', N'Peso', N'COP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (111, N'Comoros', N'KM', N'Comoran Franc', N'KMF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (112, N'Congo-Brazzaville', N'CD', N'Congolese Frank', N'CDF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (113, N'Costa Rica', N'CR', N'Costa Rican Colon', N'CRC')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (114, N'Croatia (Hrvatska)', N'HR', N'Croatian Dinar', N'HRK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (115, N'Cuba', N'CU', N'Cuban Peso', N'CUP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (116, N'Cyprus', N'CY', N'Cypriot Pound', N'CYP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (117, N'Czech Republic', N'CZ', N'Koruna', N'CZK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (118, N'Denmark', N'DK', N'Danish Krone', N'DKK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (119, N'Faroe Islands', N'FO', N'Danish Krone', N'DKK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (120, N'Greenland', N'GL', N'Danish Krone', N'DKK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (121, N'Djibouti', N'DJ', N'Djiboutian Franc', N'DJF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (122, N'Dominican Republic', N'DO', N'Dominican Peso', N'DOP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (123, N'East Timor', N'TP', N'Indonesian Rupiah', N'IDR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (124, N'Indonesia', N'ID', N'Indonesian Rupiah', N'IDR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (125, N'Ecuador', N'EC', N'Sucre', N'ECS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (126, N'Egypt', N'EG', N'Egyptian Pound', N'EGP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (127, N'El Salvador', N'SV', N'Salvadoran Colon', N'SVC')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (128, N'Eritrea', N'ER', N'Ethiopian Birr', N'ETB')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (129, N'Ethiopia', N'ET', N'Ethiopian Birr', N'ETB')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (130, N'Estonia', N'EE', N'Estonian Kroon', N'EEK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (131, N'Falkland Islands (Malvinas)', N'FK', N'Falkland Pound', N'FKP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (132, N'Fiji', N'FJ', N'Fijian Dollar', N'FJD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (133, N'French Polynesia', N'PF', N'CFP Franc', N'XPF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (134, N'New Caledonia', N'NC', N'CFP Franc', N'XPF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (135, N'Wallis and Futuna Islands', N'WF', N'CFP Franc', N'XPF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (136, N'Gambia', N'GM', N'Dalasi', N'GMD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (137, N'Georgia', N'GE', N'Lari', N'GEL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (138, N'Gibraltar', N'GI', N'Gibraltar Pound', N'GIP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (139, N'Guatemala', N'GT', N'Quetzal', N'GTQ')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (140, N'Guinea', N'GN', N'Guinean Franc', N'GNF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (141, N'Guyana', N'GY', N'Guyanaese Dollar', N'GYD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (142, N'Haiti', N'HT', N'Gourde', N'HTG')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (143, N'Honduras', N'HN', N'Lempira', N'HNL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (144, N'Hungary', N'HU', N'Forint', N'HUF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (145, N'Iceland', N'IS', N'Icelandic Krona', N'ISK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (146, N'Iran (Islamic Republic of)', N'IR', N'Iranian Rial', N'IRR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (147, N'Iraq', N'IQ', N'Iraqi Dinar', N'IQD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (148, N'Israel', N'IL', N'Shekel', N'ILS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (149, N'Jamaica', N'JM', N'Jamaican Dollar', N'JMD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (150, N'Jordan', N'JO', N'Jordanian Dinar', N'JOD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (151, N'Kazakhstan', N'KZ', N'Tenge', N'KZT')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (152, N'Kenya', N'KE', N'Kenyan Shilling', N'KES')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (153, N'Korea North', N'KP', N'Won', N'KPW')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (154, N'Korea South', N'KR', N'Won', N'KRW')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (155, N'Kuwait', N'KW', N'Kuwaiti Dinar', N'KWD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (156, N'Kyrgyzstan', N'KG', N'Som', N'KGS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (157, N'Lao PeopleÕs Democratic Republic', N'LA', N'Kip', N'LAK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (158, N'Latvia', N'LV', N'Lat', N'LVL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (159, N'Lebanon', N'LB', N'Lebanese Pound', N'LBP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (160, N'Lesotho', N'LS', N'Loti', N'LSL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (161, N'Liberia', N'LR', N'Liberian Dollar', N'LRD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (162, N'Libyan Arab Jamahiriya', N'LY', N'Libyan Dinar', N'LYD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (163, N'Liechtenstein', N'LI', N'Swiss Franc', N'CHF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (164, N'Switzerland', N'CH', N'Swiss Franc', N'CHF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (165, N'Lithuania', N'LT', N'Lita', N'LTL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (166, N'Macau', N'MO', N'Pataca', N'MOP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (167, N'Macedonia', N'MK', N'Denar', N'MKD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (168, N'Madagascar', N'MG', N'Malagasy Franc', N'MGA')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (169, N'Malawi', N'MW', N'Malawian Kwacha', N'MWK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (170, N'Malaysia', N'MY', N'Ringgit', N'MYR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (171, N'Maldives', N'MV', N'Rufiyaa', N'MVR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (172, N'Malta', N'MT', N'Maltese Lira', N'MTL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (173, N'Mauritania', N'MR', N'Ouguiya', N'MRO')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (174, N'Mauritius', N'MU', N'Mauritian Rupee', N'MUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (175, N'Mexico', N'MX', N'Peso', N'MXN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (176, N'Moldova Republic of', N'MD', N'Leu', N'MDL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (177, N'Mongolia', N'MN', N'Tugrik', N'MNT')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (178, N'Morocco', N'MA', N'Dirham', N'MAD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (179, N'Western Sahara', N'EH', N'Dirham', N'MAD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (180, N'Mozambique', N'MZ', N'Metical', N'MZN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (181, N'Myanmar', N'MM', N'Kyat', N'MMK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (182, N'Namibia', N'NA', N'Dollar', N'NAD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (183, N'Nepal', N'NP', N'Nepalese Rupee', N'NPR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (184, N'Nicaragua', N'NI', N'Cordoba Oro', N'NIO')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (185, N'Nigeria', N'NG', N'Naira', N'NGN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (186, N'Oman', N'OM', N'Sul Rial', N'OMR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (187, N'Pakistan', N'PK', N'Rupee', N'PKR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (188, N'Panama', N'PA', N'Balboa', N'PAB')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (189, N'Papua New Guinea', N'PG', N'Kina', N'PGK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (190, N'Paraguay', N'PY', N'Guarani', N'PYG')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (191, N'Peru', N'PE', N'Nuevo Sol', N'PEN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (192, N'Philippines', N'PH', N'Peso', N'PHP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (193, N'Poland', N'PL', N'Zloty', N'PLN')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (194, N'Qatar', N'QA', N'Rial', N'QAR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (195, N'Romania', N'RO', N'Leu', N'RON')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (196, N'Russian Federation', N'RU', N'Ruble', N'RUB')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (197, N'Rwanda', N'RW', N'Rwanda Franc', N'RWF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (198, N'Sao Tome and Principe', N'ST', N'Dobra', N'STD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (199, N'Saudi Arabia', N'SA', N'Riyal', N'SAR')
GO
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (200, N'Seychelles', N'SC', N'Rupee', N'SCR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (201, N'Sierra Leone', N'SL', N'Leone', N'SLL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (202, N'Singapore', N'SG', N'Dollar', N'SGD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (203, N'Slovakia (Slovak Republic)', N'SK', N'Koruna', N'SKK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (204, N'Solomon Islands', N'SB', N'Solomon Islands Dollar', N'SBD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (205, N'Somalia', N'SO', N'Shilling', N'SOS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (206, N'South Africa', N'ZA', N'Rand', N'ZAR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (207, N'Sri Lanka', N'LK', N'Rupee', N'LKR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (208, N'Sudan', N'SD', N'Dinar', N'SDG')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (209, N'Suriname', N'SR', N'Surinamese Guilder', N'SRD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (210, N'Swaziland', N'SZ', N'Lilangeni', N'SZL')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (211, N'Sweden', N'SE', N'Krona', N'SEK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (212, N'Syrian Arab Republic', N'SY', N'Syrian Pound', N'SYP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (213, N'Taiwan', N'TW', N'Dollar', N'TWD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (214, N'Tajikistan', N'TJ', N'Tajikistan Ruble', N'TJS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (215, N'Tanzania', N'TZ', N'Shilling', N'TZS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (216, N'Thailand', N'TH', N'Baht', N'THB')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (217, N'Tonga', N'TO', N'PaÕanga', N'TOP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (218, N'Trinidad and Tobago', N'TT', N'Trinidad and Tobago Dollar', N'TTD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (219, N'Tunisia', N'TN', N'Tunisian Dinar', N'TND')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (220, N'Turkey', N'TR', N'Lira', N'TRY')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (221, N'Turkmenistan', N'TM', N'Manat', N'TMT')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (222, N'Uganda', N'UG', N'Shilling', N'UGX')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (223, N'Ukraine', N'UA', N'Hryvnia', N'UAH')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (224, N'United Arab Emirates', N'AE', N'Dirham', N'AED')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (225, N'Uruguay', N'UY', N'Peso', N'UYU')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (226, N'Uzbekistan', N'UZ', N'Som', N'UZS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (227, N'Vanuatu', N'VU', N'Vatu', N'VUV')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (228, N'Venezuela', N'VE', N'Bolivar', N'VEF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (229, N'Vietnam', N'VN', N'Dong', N'VND')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (230, N'Yemen', N'YE', N'Rial', N'YER')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (231, N'Zambia', N'ZM', N'Kwacha', N'ZMK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (232, N'Zimbabwe', N'ZW', N'Zimbabwe Dollar', N'ZWD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (233, N'Aland Islands', N'AX', N'Euro', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (234, N'Angola', N'AO', N'Angolan kwanza', N'AOA')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (235, N'Antarctica', N'AQ', N'Antarctican dollar', N'AQD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (236, N'Bosnia and Herzegovina', N'BA', N'Bosnia and Herzegovina convertible mark', N'BAM')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (237, N'Congo (Kinshasa)', N'CD', N'Congolese Frank', N'CDF')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (238, N'Ghana', N'GH', N'Ghana cedi', N'GHS')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (239, N'Guernsey', N'GG', N'Guernsey pound', N'GGP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (240, N'Isle of Man', N'IM', N'Manx pound', N'GBP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (241, N'Laos', N'LA', N'Lao kip', N'LAK')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (242, N'Macao S.A.R.', N'MO', N'Macanese pataca', N'MOP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (243, N'Montenegro', N'ME', N'Euro', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (244, N'Palestinian Territory', N'PS', N'Jordanian dinar', N'JOD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (245, N'Saint Barthelemy', N'BL', N'Euro', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (246, N'Saint Helena', N'SH', N'Saint Helena pound', N'GBP')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (247, N'Saint Martin (French part)', N'MF', N'Netherlands Antillean guilder', N'ANG')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (248, N'Saint Pierre and Miquelon', N'PM', N'Euro', N'EUR')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (249, N'Serbia', N'RS', N'Serbian dinar', N'RSD')
INSERT [dbo].[CountryCurrency] ([Id], [country], [countryCode], [currency], [currencyCode]) VALUES (250, N'US Armed Forces', N'USAF', N'US Dollar', N'USD')
SET IDENTITY_INSERT [dbo].[CountryCurrency] OFF
GO
SET IDENTITY_INSERT [dbo].[Customers] ON 

INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (1, N'Maria Anders', N'Obere Str. 57', N'Berlin', N'12209', 22, N'030-0074321', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (2, N'Ana Trujillo', N'Avda. de la Constitución 2222', N'México D.F.', N'5021', 175, N'(5) 555-4729', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (3, N'Antonio Moreno', N'Mataderos  2312', N'México D.F.', N'5023', 175, N'(5) 555-3932', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (4, N'Thomas Hardy', N'120 Hanover Sq.', N'London', N'WA1 1DP', 40, N'(171) 555-7788', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (5, N'Christina Berglund', N'Berguvsvägen  8', N'Luleå', N'S-958 22', 211, N'0921-12 34 65', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (6, N'Hanna Moos', N'Forsterstr. 57', N'Mannheim', N'68306', 22, N'0621-08460', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (7, N'Frédérique Citeaux', N'24, place Kléber', N'Strasbourg', N'67000', 19, N'88.60.15.31', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (8, N'Martín Sommer', N'C/ Araquil, 67', N'Madrid', N'28023', 37, N'(91) 555 22 82', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (9, N'Laurence Lebihan', N'12, rue des Bouchers', N'Marseille', N'13008', 19, N'91.24.45.40', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (10, N'Elizabeth Lincoln', N'23 Tsawassen Blvd.', N'Tsawassen', N'T2F 8M4', 55, N'(604) 555-4729', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (11, N'Victoria Ashworth', N'Fauntleroy Circus', N'London', N'EC2 5NT', 40, N'(171) 555-1212', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (12, N'Patricio Simpson', N'Cerrito 333', N'Buenos Aires', N'1010', 68, N'(1) 135-5555', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (13, N'Francisco Chang', N'Sierras de Granada 9993', N'México D.F.', N'5022', 175, N'(5) 555-3392', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (14, N'Yang Wang', N'Hauptstr. 29', N'Bern', N'3012', 164, N'0452-076545', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (15, N'Pedro Afonso', N'Av. dos Lusíadas, 23', N'Sao Paulo', N'05432-043', 95, N'(11) 555-7647', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (16, N'Elizabeth Brown', N'Berkeley Gardens 12  Brewery', N'London', N'WX1 6LT', 40, N'(171) 555-2282', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (17, N'Sven Ottlieb', N'Walserweg 21', N'Aachen', N'52066', 22, N'0241-039123', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (18, N'Janine Labrune', N'67, rue des Cinquante Otages', N'Nantes', N'44000', 19, N'40.67.88.88', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (19, N'Ann Devon', N'35 King George', N'London', N'WX3 6FW', 40, N'(171) 555-0297', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (20, N'Roland Mendel', N'Kirchgasse 6', N'Graz', N'8010', 16, N'7675-3425', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (21, N'Aria Cruz', N'Rua Orós, 92', N'Sao Paulo', N'05442-030', 95, N'(11) 555-9857', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (22, N'Diego Roel', N'C/ Moralzarzal, 86', N'Madrid', N'28034', 37, N'(91) 555 94 44', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (23, N'Martine Rancé', N'184, chaussée de Tournai', N'Lille', N'59000', 19, N'20.16.10.16', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (24, N'Maria Larsson', N'Åkergatan 24', N'Bräcke', N'S-844 67', 211, N'0695-34 67 21', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (25, N'Peter Franken', N'Berliner Platz 43', N'München', N'80805', 22, N'089-0877310', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (26, N'Carine Schmitt', N'54, rue Royale', N'Nantes', N'44000', 19, N'40.32.21.21', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (27, N'Paolo Accorti', N'Via Monte Bianco 34', N'Torino', N'10100', 26, N'011-4988260', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (28, N'Lino Rodriguez', N'Jardim das rosas n. 32', N'Lisboa', N'1675', 32, N'(1) 354-2534', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (29, N'Eduardo Saavedra', N'Rambla de Cataluña, 23', N'Barcelona', N'8022', 37, N'(93) 203 4560', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (30, N'José Pedro Freyre', N'C/ Romero, 33', N'Sevilla', N'41101', 37, N'(95) 555 82 82', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (31, N'André Fonseca', N'Av. Brasil, 442', N'Campinas', N'04876-786', 95, N'(11) 555-9482', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (32, N'Howard Snyder', N'2732 Baker Blvd.', N'Eugene', N'97403', 50, N'(503) 555-7555', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (33, N'Manuel Pereira', N'5ª Ave. Los Palos Grandes', N'Caracas', N'1081', 228, N'(2) 283-2951', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (34, N'Mario Pontes', N'Rua do Paço, 67', N'Rio de Janeiro', N'05454-876', 95, N'(21) 555-0091', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (35, N'Carlos Hernández', N'Carrera 22 con Ave. Carlos Soublette #8-35', N'San Cristóbal', N'5022', 228, N'(5) 555-1340', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (36, N'Yoshi Latimer', N'City Center Plaza 516 Main St.', N'Elgin', N'97827', 50, N'(503) 555-6874', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (37, N'Patricia McKenna', N'8 Johnstown Road', N'Cork', N'T12 E3C6', 25, N'2967 542', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (38, N'Helen Bennett', N'Garden House Crowther Way', N'Cowes', N'PO31 7PJ', 40, N'(198) 555-8888', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (39, N'Philip Cramer', N'Maubelstr. 90', N'Brandenburg', N'14776', 22, N'0555-09876', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (40, N'Daniel Tonini', N'67, avenue de l''Europe', N'Versailles', N'78000', 19, N'30.59.84.10', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (41, N'Annette Roulet', N'1 rue Alsace-Lorraine', N'Toulouse', N'31000', 19, N'61.77.61.10', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (42, N'Yoshi Tannamuri', N'1900 Oak St.', N'Vancouver', N'V3F 2K1', 55, N'(604) 555-3392', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (43, N'John Steel', N'12 Orchestra Terrace', N'Walla Walla', N'99362', 50, N'(509) 555-7969', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (44, N'Renate Messner', N'Magazinweg 7', N'Frankfurt a.M.', N'60528', 22, N'069-0245984', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (45, N'Jaime Yorres', N'87 Polk St. Suite 5', N'San Francisco', N'94117', 50, N'(415) 555-5938', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (46, N'Carlos González', N'Carrera 52 con Ave. Bolívar #65-98 Llano Largo', N'Barquisimeto', N'3508', 228, N'(9) 331-6954', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (47, N'Felipe Izquierdo', N'Ave. 5 de Mayo Porlamar', N'I. de Margarita', N'4980', 228, N'(8) 34-56-12', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (48, N'Fran Wilson', N'89 Chiaroscuro Rd.', N'Portland', N'97219', 50, N'(503) 555-9573', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (49, N'Giovanni Rovelli', N'Via Ludovico il Moro 22', N'Bergamo', N'24100', 26, N'035-640230', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (50, N'Catherine Dewey', N'Rue Joseph-Bens 532', N'Bruxelles', N'B-1180', 17, N'(02) 201 24 67', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (51, N'Jean Fresnière', N'43 rue St. Laurent', N'Montréal', N'H1J 1C3', 55, N'(514) 555-8054', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (52, N'Alexander Feuer', N'Heerstr. 22', N'Leipzig', N'4179', 22, N'0342-023176', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (53, N'Simon Crowther', N'South House 300 Queensbridge', N'London', N'SW7 1RZ', 40, N'(171) 555-7733', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (54, N'Yvonne Moncada', N'Ing. Gustavo Moncada 8585 Piso 20-A', N'Buenos Aires', N'1010', 68, N'(1) 135-5333', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (55, N'Rene Phillips', N'2743 Bering St.', N'Anchorage', N'99508', 50, N'(907) 555-7584', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (56, N'Henriette Pfalzheim', N'Mehrheimerstr. 369', N'Köln', N'50739', 22, N'0221-0644327', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (57, N'Marie Bertrand', N'265, boulevard Charonne', N'Paris', N'75012', 19, N'(1) 42.34.22.66', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (58, N'Guillermo Fernández', N'Calle Dr. Jorge Cash 321', N'México D.F.', N'5033', 175, N'(5) 552-3745', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (59, N'Georg Pipps', N'Geislweg 14', N'Salzburg', N'5020', 16, N'6562-9722', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (60, N'Isabel de Castro', N'Estrada da saúde n. 58', N'Lisboa', N'1756', 32, N'(1) 356-5634', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (61, N'Bernardo Batista', N'Rua da Panificadora, 12', N'Rio de Janeiro', N'02389-673', 95, N'(21) 555-4252', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (62, N'Lúcia Carvalho', N'Alameda dos Canàrios, 891', N'Sao Paulo', N'05487-020', 95, N'(11) 555-1189', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (63, N'Horst Kloss', N'Taucherstraße 10', N'Cunewalde', N'1307', 22, N'0372-035188', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (64, N'Sergio Gutiérrez', N'Av. del Libertador 900', N'Buenos Aires', N'1010', 68, N'(1) 123-5555', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (65, N'Paula Wilson', N'2817 Milton Dr.', N'Albuquerque', N'87110', 50, N'(505) 555-5939', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (66, N'Maurizio Moroni', N'Strada Provinciale 124', N'Reggio Emilia', N'42100', 26, N'0522-556721', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (67, N'Janete Limeira', N'Av. Copacabana, 267', N'Rio de Janeiro', N'02389-890', 95, N'(21) 555-3412', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (68, N'Michael Holz', N'Grenzacherweg 237', N'Genève', N'1203', 164, N'0897-034214', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (69, N'Alejandra Camino', N'Gran Vía, 1', N'Madrid', N'28001', 37, N'(91) 745 6200', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (70, N'Jonas Bergulfsen', N'Erling Skakkes gate 78', N'Stavern', N'4110', 93, N'07-98 92 35', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (71, N'Jose Pavarotti', N'187 Suffolk Ln.', N'Boise', N'83720', 50, N'(208) 555-8097', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (72, N'Hari Kumar', N'90 Wadhurst Rd.', N'London', N'OX15 4NB', 40, N'(171) 555-1717', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (73, N'Jytte Petersen', N'Vinbæltet 34', N'Kobenhavn', N'1734', 118, N'31 12 34 56', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (74, N'Dominique Perrier', N'25, rue Lauriston', N'Paris', N'75016', 19, N'(1) 47.55.60.10', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (75, N'Art Braunschweiger', N'P.O. Box 555', N'Lander', N'82520', 50, N'(307) 555-4680', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (76, N'Pascale Cartrain', N'Boulevard Tirou, 255', N'Charleroi', N'B-6000', 17, N'(071) 23 67 22 20', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (77, N'Liz Nixon', N'89 Jefferson Way Suite 2', N'Portland', N'97201', 50, N'(503) 555-3612', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (78, N'Liu Wong', N'55 Grizzly Peak Rd.', N'Butte', N'59801', 50, N'(406) 555-5834', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (79, N'Karin Josephs', N'Luisenstr. 48', N'Münster', N'44087', 22, N'0251-031259', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (80, N'Miguel Angel Paolino', N'Avda. Azteca 123', N'México D.F.', N'5033', 175, N'(5) 555-2933', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (81, N'Anabela Domingues', N'Av. Inês de Castro, 414', N'Sao Paulo', N'05634-030', 95, N'(11) 555-2167', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (82, N'Helvetius Nagy', N'722 DaVinci Blvd.', N'Kirkland', N'98034', 50, N'(206) 555-8257', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (83, N'Palle Ibsen', N'Smagsloget 45', N'Århus', N'8200', 118, N'86 21 32 43', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (84, N'Mary Saveley', N'2, rue du Commerce', N'Lyon', N'69004', 19, N'78.32.54.86', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (85, N'Paul Henriot', N'59 rue de l''Abbaye', N'Reims', N'51100', 19, N'26.47.15.10', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (86, N'Rita Müller', N'Adenauerallee 900', N'Stuttgart', N'70563', 22, N'0711-020361', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (87, N'Pirkko Koskitalo', N'Torikatu 38', N'Oulu', N'90110', 18, N'981-443655', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (88, N'Paula Parente', N'Rua do Mercado, 12', N'Resende', N'08737-363', 95, N'(14) 555-8122', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (89, N'Karl Jablonski', N'305 - 14th Ave. S. Suite 3B', N'Seattle', N'98128', 50, N'(206) 555-4112', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (90, N'Matti Karttunen', N'Keskuskatu 45', N'Helsinki', N'21240', 18, N'90-224 8858', N'dummy@test.com')
INSERT [dbo].[Customers] ([Id], [name], [address], [city], [postalCode], [country], [phone], [mailAdr]) VALUES (91, N'Zbyszek Piestrzeniewicz', N'ul. Filtrowa 68', N'Warszawa', N'01-012', 193, N'(26) 642-7012', N'dummy@test.com')
SET IDENTITY_INSERT [dbo].[Customers] OFF
GO
SET IDENTITY_INSERT [dbo].[DieselPrice] ON 

INSERT [dbo].[DieselPrice] ([Id], [date], [price]) VALUES (1, CAST(N'2020-11-07' AS Date), 1.0400)
INSERT [dbo].[DieselPrice] ([Id], [date], [price]) VALUES (2, CAST(N'2020-11-08' AS Date), 1.0500)
SET IDENTITY_INSERT [dbo].[DieselPrice] OFF
GO
USE [master]
GO
ALTER DATABASE [LuxYachtDieselDB] SET  READ_WRITE 
GO
