<?php
namespace Ajp;

interface PacketInterface
{
    const REQUEST_CODE = 0x1234;
    const RESPONSE_CODE = 0x4142;
    
    const TYPE_FORWARD_REQUEST = 0x02;
    const TYPE_SEND_BODY_CHUNK = 0x03;
    const TYPE_SEND_HEADERS = 0x04;
    const TYPE_END_RESPONSE = 0x05;
    const TYPE_GET_BODY_CHUNK = 0x06;
    const TYPE_SHUTDOWN = 0x07;
    const TYPE_PING = 0x08;
    const TYPE_CPONG = 0x09;
    const TYPE_CPING = 0x0A;
    
    const METHOD_OPTIONS = 0x01;
    const METHOD_GET = 0x02;
    const METHOD_HEAD = 0x03;
    const METHOD_POST = 0x04;
    const METHOD_PUT = 0x05;
    const METHOD_DELETE = 0x06;
    const METHOD_TRACE = 0x07;
    const METHOD_PROPFIND = 0x08;
    const METHOD_PROPPATCH = 0x09;
    const METHOD_MKCOL = 0x0A;
    const METHOD_COPY = 0x0B;
    const METHOD_MOVE = 0x0C;
    const METHOD_LOCK = 0x0D;
    const METHOD_UNLOCK = 0x0E;
    const METHOD_ACL = 0x0F;
    const METHOD_REPORT = 0x10;
    const METHOD_VERSION_CONTROL = 0x11;
    const METHOD_CHECKIN = 0x12;
    const METHOD_CHECKOUT = 0x13;
    const METHOD_UNCHECKOUT = 0x14;
    const METHOD_SEARCH = 0x15;
    const METHOD_MKWORKSPACE = 0x16;
    const METHOD_UPDATE = 0x17;
    const METHOD_LABEL = 0x17;
    const METHOD_MERGE = 0x19;
    const METHOD_BASELINE_CONTROL = 0x1A;
    const METHOD_MKACTIVITY = 0x1B;
    
    const HEADER_REQ_ACCEPT = 0xA001;
    const HEADER_REQ_ACCEPT_CHARSET = 0xA002;
    const HEADER_REQ_ACCEPT_ENCODING = 0xA003;
    const HEADER_REQ_ACCEPT_LANGUAGE = 0xA004;
    const HEADER_REQ_AUTHORIZATION = 0xA005;
    const HEADER_REQ_CONNECTION = 0xA006;
    const HEADER_REQ_CONTENT_TYPE = 0xA007;
    const HEADER_REQ_CONTENT_LENGTH = 0xA008;
    const HEADER_REQ_COOKIE = 0xA009;
    const HEADER_REQ_COOKIE2 = 0xA00A;
    const HEADER_REQ_HOST = 0xA00B;
    const HEADER_REQ_PRAGMA = 0xA00C;
    const HEADER_REQ_REFERER = 0xA00D;
    const HEADER_REQ_USER_AGENT = 0xA00E;
    
    const HEADER_RES_CONTENT_TYPE = 0xA001;
    const HEADER_RES_CONTENT_LANGUAGE = 0xA002;
    const HEADER_RES_CONTENT_LENGTH = 0xA003;
    const HEADER_RES_DATE = 0xA004;
    const HEADER_RES_LAST_MODIFIED = 0xA005;
    const HEADER_RES_LOCATION = 0xA006;
    const HEADER_RES_SET_COOKIE = 0xA007;
    const HEADER_RES_SET_COOKIE_2 = 0xA008;
    const HEADER_RES_SERVLET_ENGINE = 0xA009;
    const HEADER_RES_STATUS = 0xA00A;
    const HEADER_RES_WWW_AUTHENTICATE = 0xA00B;
    
    const ATTRIBUTE_CONTEXT = 0x01;
    const ATTRIBUTE_SERVLET_PATH = 0x02;
    const ATTRIBUTE_REMOTE_USER = 0x03;
    const ATTRIBUTE_AUTH_TYPE = 0x04;
    const ATTRIBUTE_QUERY_STRING = 0x05;
    const ATTRIBUTE_ROUTE = 0x06;
    const ATTRIBUTE_SSL_CERT = 0x07;
    const ATTRIBUTE_SSL_CIPHER = 0x08;
    const ATTRIBUTE_SSL_SESSION = 0x09;
    const ATTRIBUTE_REQUEST_ATTRIBUTE = 0x0A;
    const ATTRIBUTE_SSL_KEY_SIZE = 0x0B;
    const ATTRIBUTE_SECRET = 0x0C;
    const ATTRIBUTE_STORED_METHOD = 0x0D;
    
    const REQUEST_TERMINATOR = 0xFF;

    public function __construct(PacketSerializerInterface $serializer = null, PacketParserInterface $parser = null);

    public function getHeaderCode();
    
    public function getType();
    
    public function getSerializer();
}
